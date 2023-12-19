<?php

namespace App\Livewire;

use App\Models\Pizza;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;

class ListPizzas extends Component
{

    use WithPagination;


    protected $listeners = ['sendData' => 'searchPizzas'];

    public $termino;
    public $categoria;
    public $tamano;

    public function searchPizzas($termino, $categoria, $tamano){
        $this->termino = $termino;
        $this->categoria = $categoria;
        $this->tamano = $tamano;
        $this->resetPage(); //esto me costó 2 horas de pensamiento logico xd
    }

    public function render()
    {
        $pizzas = Pizza::when($this->termino, function($query){
            $query->where('nombre', 'LIKE', '%'.Str::upper($this->termino).'%');
        })->when($this->termino, function($query){
            $query->orWhere('descripcion', 'LIKE', '%'.Str::upper($this->termino).'%');
        })->when($this->categoria, function($query){
            $query->where('categoria_id', '=', $this->categoria);
        })->when($this->tamano, function($query){
            $query->where('tamano_id', '=', $this->tamano);
        })
        ->paginate(10);

        return view('livewire.list-pizzas', compact('pizzas'));
    }
}
