<?php

namespace App\Livewire;

use App\Models\Tamano;
use Livewire\Component;
use App\Models\Categoria;

class EditPizzas extends Component
{

    public $nombre;
    public $precio;
    public $tamano_id;
    public $categoria_id;
    public $descripcion;
    public $foto;

    public function mount($pizza)
    {
        $this->nombre = $pizza->nombre;
        $this->precio = $pizza->precio;
        $this->tamano_id = $pizza->tamano_id;
        $this->categoria_id = $pizza->categoria_id;
        $this->descripcion = $pizza->descripcion;
    }

    public function render()
    {
        $cat = Categoria::all();
        $tam = Tamano::all();
        return view('livewire.edit-pizzas', [
            'categorias' => $cat,
            'tamanos' => $tam
        ]);
    }
}
