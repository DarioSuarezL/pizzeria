<?php

namespace App\Livewire;

use App\Models\Pizza;
use App\Models\Tamano;
use Livewire\Component;
use App\Models\Categoria;
use Livewire\WithFileUploads;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class EditPizzas extends Component
{

    use WithFileUploads;

    public $id;
    public $nombre;
    public $precio;
    public $tamano_id;
    public $categoria_id;
    public $descripcion;
    public $foto;
    public $foto_act;

    protected $rules = [
        'nombre' => 'required',
        'precio' => 'required|numeric',
        'tamano_id' => 'required',
        'categoria_id' => 'required',
        'descripcion' => 'required',
        // 'foto' => 'required|image|max:2048'
    ];

    public function mount($pizza)
    {
        $this->nombre = $pizza->nombre;
        $this->precio = $pizza->precio;
        $this->tamano_id = $pizza->tamano_id;
        $this->categoria_id = $pizza->categoria_id;
        $this->descripcion = $pizza->descripcion;
        $this->foto_act = $pizza->imagen_url;

        $this->id = $pizza->id;
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

    public function update(){
        $this->validate();
        if($this->foto != null){
            $this->validate([
                'foto' => 'required|image|max:2048'
            ]);
            $imagen_url = Cloudinary::upload($this->foto->getRealPath())->getSecurePath();
        }

        $pizza = Pizza::find($this->id);
        $pizza->update([
            'nombre' => $this->nombre,
            'precio' => $this->precio,
            'categoria_id' => $this->categoria_id,
            'tamano_id' => $this->tamano_id,
            'imagen_url' => $this->foto ? $imagen_url : $this->foto_act,
            'descripcion' => $this->descripcion
        ]);

        return redirect()->route('pizzas.index')->with('success','Pizza editada correctamente');
    }
}
