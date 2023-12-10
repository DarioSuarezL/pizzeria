<?php

namespace App\Livewire;

use App\Models\Tamano;
use Livewire\Component;
use App\Models\Categoria;

class FormPizzas extends Component
{

    public $cat, $tam;

    public function render()
    {
        $this->cat = Categoria::all();
        $this->tam = Tamano::all();
        return view('livewire.form-pizzas', [
            'categorias' => $this->cat,
            'tamanos' => $this->tam
        ]);
    }
}
