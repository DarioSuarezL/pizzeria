<?php

namespace App\Livewire;

use App\Models\Pizza;
use Livewire\Component;

class ListPizzas extends Component
{
    public function render()
    {
        $pizzas = Pizza::paginate(10);
        return view('livewire.list-pizzas', compact('pizzas'));
    }
}
