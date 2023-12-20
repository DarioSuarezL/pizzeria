<?php

namespace App\Livewire;

use App\Models\Pedido;
use Livewire\Component;

class ListPedidos extends Component
{
    public function render()
    {
        $pedidos = Pedido::where('estado_id',2)->get();
        return view('livewire.list-pedidos', compact('pedidos'));
    }

    public function envio(Pedido $pedido){
        $pedido->estado_id = 3;
        $pedido->save();
        // $this->emit('alert', 'El pedido se ha enviado correctamente');
        session()->flash('alert', 'El pedido se ha enviado correctamente');
    }

}
