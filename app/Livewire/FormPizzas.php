<?php

namespace App\Livewire;

use App\Models\Pizza;
use App\Models\Tamano;
use Livewire\Component;
use App\Models\Categoria;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Livewire\WithFileUploads;

class FormPizzas extends Component
{

    public $nombre;
    public $precio;
    public $tamano_id;
    public $categoria_id;
    public $descripcion;
    public $foto;

    use WithFileUploads;

    protected $rules = [
        'nombre' => 'required',
        'precio' => 'required|numeric',
        'tamano_id' => 'required',
        'categoria_id' => 'required',
        'descripcion' => 'required',
        'foto' => 'required|image|max:2048'
    ];

    public function render()
    {
        $cat = Categoria::all();
        $tam = Tamano::all();
        return view('livewire.form-pizzas', [
            'categorias' => $cat,
            'tamanos' => $tam
        ]);
    }

    public function store()
    {
        $this->validate();
        $imagen_url = Cloudinary::upload($this->foto->getRealPath())->getSecurePath();

        Pizza::create([
            'nombre' => $this->nombre,
            'precio' => $this->precio,
            'categoria_id' => $this->categoria_id,
            'tamano_id' => $this->tamano_id,
            'imagen_url' => $imagen_url,
            'descripcion' => $this->descripcion
        ]);

        return redirect()->route('pizzas.index')->with('success','Pizza creada correctamente');
    }
}
