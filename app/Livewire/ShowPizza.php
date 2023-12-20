<?php

namespace App\Livewire;

use App\Models\DetallePedido;
use App\Models\Pedido;
use Livewire\Component;

class ShowPizza extends Component
{

    public $pizza;

    public $cantidad = 1;

    public function render()
    {
        return view('livewire.show-pizza');
    }

    public function carrito(){
        if(auth()->user()->cliente->hasCarrito()){
            $pedido = auth()->user()->cliente->hasCarrito();
        }else{
            $pedido = Pedido::create([
                'cliente_id' => auth()->user()->cliente->id,
                'estado_id' => 1,
                'total' => 0,
                'metodo_pago_id' => 4,
                'pago_estados_id' => 1,
            ]);
        }

        $detalle = DetallePedido::create([
            'pedido_id' => $pedido->id,
            'pizza_id' => $this->pizza->id,
            'cantidad' => $this->cantidad,
            'subtotal' => $this->pizza->precio * $this->cantidad
        ]);

        $pedido->total = $pedido->total + $detalle->subtotal;
        $pedido->save();

        return redirect()->route('pizzas.index')->with('success', 'Pizza agregada al carrito');
    }

}
