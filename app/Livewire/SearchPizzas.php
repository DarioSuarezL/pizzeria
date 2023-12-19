<?php

namespace App\Livewire;

use App\Models\Tamano;
use Livewire\Component;
use App\Models\Categoria;
use Livewire\WithPagination;

class SearchPizzas extends Component
{

    public $termino;
    public $categoria;
    public $tamano;


    public function sendData(){
        $this->dispatch('sendData', $this->termino, $this->categoria, $this->tamano);
        // dd('updatingSearch');
    }

    public function render()
    {
        $categorias = Categoria::all();
        $tamanos = Tamano::all();
        return view('livewire.search-pizzas', [
            'categorias' => $categorias,
            'tamanos' => $tamanos
        ]);
    }
}
