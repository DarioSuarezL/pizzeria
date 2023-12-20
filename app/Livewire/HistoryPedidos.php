<?php

namespace App\Livewire;

use Livewire\Component;

class HistoryPedidos extends Component
{

    public $pedidos;

    public function render()
    {
        $this->pedidos = auth()->user()->cliente->pedidos;
        return view('livewire.history-pedidos', [
            'pedidos' => $this->pedidos
        ]);
    }
}
