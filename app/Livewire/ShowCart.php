<?php

namespace App\Livewire;

use App\Models\DetallePedido;
use App\Models\Pedido;
use Livewire\Component;

class ShowCart extends Component
{

    public function render()
    {
        $pedido = Pedido::where('cliente_id', auth()->user()->cliente->id)->where('estado_id', 1)->first();
        if($pedido){
            $detalles = DetallePedido::where('pedido_id', $pedido->id)->get();
            $total = $detalles->sum('subtotal');

            return view('livewire.show-cart', [
                'detalles' => $detalles,
                'total' => $total,
            ]);
        }
        return view('livewire.show-cart', [
            'detalles' => [],
            'total' => 0,
        ]);
    }

    public function delete($id)
    {
        $detalle = DetallePedido::find($id);
        $pedido = Pedido::find($detalle->pedido->id);
        $pedido->total = $pedido->total - $detalle->subtotal;

        $detalle->delete();

        if($pedido->total == 0){
            $pedido->delete();
        }else{
            $pedido->save();
        }

    }

}
