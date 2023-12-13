<?php

namespace App\Livewire;

use App\Models\Cliente;
use Livewire\Component;

class ListClientes extends Component
{
    public function render()
    {
        $clientes = Cliente::paginate(10);
        return view('livewire.list-clientes', compact('clientes'));
    }
}
