<?php

namespace Database\Seeders;

use App\Models\Pizza;
use App\Models\Tamano;
use App\Models\Categoria;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $premium = Categoria::create([
            'nombre' => 'Pizzas Premium'
        ]);

        $normales = Categoria::create([
            'nombre' => 'Pizzas Normales'
        ]);

        $pequeño = Tamano::create([
            'nombre' => 'Pequeña'
        ]);

        $grande = Tamano::create([
            'nombre' => 'Grande'
        ]);

        //pizzas especiales
        Pizza::create([
            'nombre' => 'CHESSEBURGER - GRANDE',
            'precio' => 56.00,
            'imagen_url' => "https://res.cloudinary.com/dt0pbqivj/image/upload/v1702101682/ChesseBurguer_w5hfyt.jpg",
            'descripcion' => 'CARNE MOLIDA, TOCINO Y CHEDDAR.',
            'tamano_id' => $grande->id,
            'categoria_id' => $premium->id
        ]);

        Pizza::create([
            'nombre' => 'CHESSEBURGER - PEQUEÑA',
            'precio' => 32.00,
            'imagen_url' => 'https://res.cloudinary.com/dt0pbqivj/image/upload/v1702101682/ChesseBurguer_w5hfyt.jpg',
            'descripcion' => 'CARNE MOLIDA, TOCINO Y CHEDDAR.',
            'tamano_id' => $pequeño->id,
            'categoria_id' => $premium->id
        ]);

        Pizza::create([
            'nombre' => '4 QUESOS - GRANDE',
            'precio' => 56.00,
            'imagen_url' => 'https://res.cloudinary.com/dt0pbqivj/image/upload/v1702101685/CuatroQuesos_guachl.jpg',
            'descripcion' => 'MOZZARELLA, CHEDDAR, REQUESÓN Y ROQUEFORT.',
            'tamano_id' => $grande->id,
            'categoria_id' => $premium->id
        ]);

        Pizza::create([
            'nombre' => '4 QUESOS - PEQUEÑA',
            'precio' => 32.00,
            'imagen_url' => 'https://res.cloudinary.com/dt0pbqivj/image/upload/v1702101685/CuatroQuesos_guachl.jpg',
            'descripcion' => 'MOZZARELLA, CHEDDAR, REQUESÓN Y ROQUEFORT.',
            'tamano_id' => $pequeño->id,
            'categoria_id' => $premium->id
        ]);

        Pizza::create([
            'nombre' => 'STROGONOFF - GRANDE',
            'precio' => 54.00,
            'imagen_url' => 'https://res.cloudinary.com/dt0pbqivj/image/upload/v1702101687/Strogonoff_aet15x.jpg',
            'descripcion' => 'POLLO, JAMÓN, PAPAS FRITAS Y MOZZARELLA.',
            'tamano_id' => $grande->id,
            'categoria_id' => $premium->id
        ]);

        Pizza::create([
            'nombre' => 'STROGONOFF - PEQUEÑA',
            'precio' => 30.00,
            'imagen_url' => 'https://res.cloudinary.com/dt0pbqivj/image/upload/v1702101687/Strogonoff_aet15x.jpg',
            'descripcion' => 'POLLO, JAMÓN, PAPAS FRITAS Y MOZZARELLA.',
            'tamano_id' => $pequeño->id,
            'categoria_id' => $premium->id
        ]);

        Pizza::create([
            'nombre' => 'CARNIVORA - GRANDE',
            'precio' => 54.00,
            'imagen_url' => 'https://res.cloudinary.com/dt0pbqivj/image/upload/v1702101682/Carnivora_fkdn1k.jpg',
            'descripcion' => 'CARNE MOLIDA, JAMÓN, CHOCLO Y CHEDDAR.',
            'tamano_id' => $grande->id,
            'categoria_id' => $premium->id
        ]);

        Pizza::create([
            'nombre' => 'CARNIVORA - PEQUEÑA',
            'precio' => 30.00,
            'imagen_url' => 'https://res.cloudinary.com/dt0pbqivj/image/upload/v1702101682/Carnivora_fkdn1k.jpg',
            'descripcion' => 'CARNE MOLIDA, JAMÓN, CHOCLO Y CHEDDAR.',
            'tamano_id' => $pequeño->id,
            'categoria_id' => $premium->id
        ]);

        Pizza::create([
            'nombre' => 'PERNIL - GRANDE',
            'precio' => 52.00,
            'imagen_url' => 'https://res.cloudinary.com/dt0pbqivj/image/upload/v1702101685/Pernil_oapxf1.jpg',
            'descripcion' => 'PERNIL DE CERDO, PIMENTÓN, CHOCLO Y MOZZARELLA.',
            'tamano_id' => $grande->id,
            'categoria_id' => $premium->id
        ]);

        Pizza::create([
            'nombre' => 'PERNIL - PEQUEÑA',
            'precio' => 28.00,
            'imagen_url' => 'https://res.cloudinary.com/dt0pbqivj/image/upload/v1702101685/Pernil_oapxf1.jpg',
            'descripcion' => 'PERNIL DE CERDO, PIMENTÓN, CHOCLO Y MOZZARELLA.',
            'tamano_id' => $pequeño->id,
            'categoria_id' => $premium->id
        ]);

        Pizza::create([
            'nombre' => '3 QUESOS - GRANDE',
            'precio' => 50.00,
            'imagen_url' => 'https://res.cloudinary.com/dt0pbqivj/image/upload/v1702101686/TresQuesos_ona1hf.jpg',
            'descripcion' => 'MOZZARELLA, CHEDDAR Y REQUESÓN.',
            'tamano_id' => $grande->id,
            'categoria_id' => $premium->id
        ]);

        Pizza::create([
            'nombre' => '3 QUESOS - PEQUEÑA',
            'precio' => 28.00,
            'imagen_url' => 'https://res.cloudinary.com/dt0pbqivj/image/upload/v1702101686/TresQuesos_ona1hf.jpg',
            'descripcion' => 'MOZZARELLA, CHEDDAR Y REQUESÓN.',
            'tamano_id' => $pequeño->id,
            'categoria_id' => $premium->id
        ]);

        //pizzas ordinarias

        Pizza::create([
            'nombre' => 'CALABRESA - GRANDE',
            'precio' => 48.00,
            'imagen_url' => 'https://res.cloudinary.com/dt0pbqivj/image/upload/v1702101682/Calabresa_ow4yvl.jpg',
            'descripcion' => 'CALABRESA, MOZZARELLA, CHOCLO O ACEITUNAS.',
            'tamano_id' => $grande->id,
            'categoria_id' => $normales->id
        ]);

        Pizza::create([
            'nombre' => 'CALABRESA - PEQUEÑA',
            'precio' => 26.00,
            'imagen_url' => 'https://res.cloudinary.com/dt0pbqivj/image/upload/v1702101682/Calabresa_ow4yvl.jpg',
            'descripcion' => 'CALABRESA, MOZZARELLA, CHOCLO O ACEITUNAS.',
            'tamano_id' => $pequeño->id,
            'categoria_id' => $normales->id
        ]);

        Pizza::create([
            'nombre' => 'AMERICANA - GRANDE',
            'precio' => 48.00,
            'imagen_url' => 'https://res.cloudinary.com/dt0pbqivj/image/upload/v1702101686/Americana_gcr3xy.jpg',
            'descripcion' => 'HUEVO, TOCINO Y MOZZARELLA.',
            'tamano_id' => $grande->id,
            'categoria_id' => $normales->id
        ]);

        Pizza::create([
            'nombre' => 'AMERICANA - PEQUEÑA',
            'precio' => 26.00,
            'imagen_url' => 'https://res.cloudinary.com/dt0pbqivj/image/upload/v1702101686/Americana_gcr3xy.jpg',
            'descripcion' => 'HUEVO, TOCINO Y MOZZARELLA.',
            'tamano_id' => $pequeño->id,
            'categoria_id' => $normales->id
        ]);

        Pizza::create([
            'nombre' => 'PEPERONI - GRANDE',
            'precio' => 48.00,
            'imagen_url' => 'https://res.cloudinary.com/dt0pbqivj/image/upload/v1702101686/Peperoni_ahvta0.jpg',
            'descripcion' => 'PEPERONI Y MOZZARELLA.',
            'tamano_id' => $grande->id,
            'categoria_id' => $normales->id
        ]);

        Pizza::create([
            'nombre' => 'PEPERONI - PEQUEÑA',
            'precio' => 26.00,
            'imagen_url' => 'https://res.cloudinary.com/dt0pbqivj/image/upload/v1702101686/Peperoni_ahvta0.jpg',
            'descripcion' => 'PEPERONI Y MOZZARELLA.',
            'tamano_id' => $pequeño->id,
            'categoria_id' => $normales->id
        ]);

        Pizza::create([
            'nombre' => 'VEGETARIANA - GRANDE',
            'precio' => 48.00,
            'imagen_url' => 'https://res.cloudinary.com/dt0pbqivj/image/upload/v1702101687/Vegetariana_wmjio1.jpg',
            'descripcion' => 'TOMATE, CHAMPIÑONES, PIMENTÓN, CHOCLO Y MOZZARELLA.',
            'tamano_id' => $grande->id,
            'categoria_id' => $normales->id
        ]);

        Pizza::create([
            'nombre' => 'VEGETARIANA - PEQUEÑA',
            'precio' => 26.00,
            'imagen_url' => 'https://res.cloudinary.com/dt0pbqivj/image/upload/v1702101687/Vegetariana_wmjio1.jpg',
            'descripcion' => 'TOMATE, CHAMPIÑONES, PIMENTÓN, CHOCLO Y MOZZARELLA.',
            'tamano_id' => $pequeño->id,
            'categoria_id' => $normales->id
        ]);

        Pizza::create([
            'nombre' => 'HAWAIANA - GRANDE',
            'precio' => 46.00,
            'imagen_url' => 'https://res.cloudinary.com/dt0pbqivj/image/upload/v1702101683/Hawaiana_tct2sz.jpg',
            'descripcion' => 'JAMÓN, PIÑA Y MOZZARELLA.',
            'tamano_id' => $grande->id,
            'categoria_id' => $normales->id
        ]);

        Pizza::create([
            'nombre' => 'HAWAIANA - PEQUEÑA',
            'precio' => 24.00,
            'imagen_url' => 'https://res.cloudinary.com/dt0pbqivj/image/upload/v1702101683/Hawaiana_tct2sz.jpg',
            'descripcion' => 'JAMÓN, PIÑA Y MOZZARELLA.',
            'tamano_id' => $pequeño->id,
            'categoria_id' => $normales->id
        ]);

        Pizza::create([
            'nombre' => 'CLÁSICA - GRANDE',
            'precio' => 44.00,
            'imagen_url' => 'https://res.cloudinary.com/dt0pbqivj/image/upload/v1702101683/Clasica_zlmovf.jpg',
            'descripcion' => 'JAMÓN, CHOCLO Y MOZZARELLA.',
            'tamano_id' => $grande->id,
            'categoria_id' => $normales->id
        ]);

        Pizza::create([
            'nombre' => 'CLÁSICA - PEQUEÑA',
            'precio' => 24.00,
            'imagen_url' => 'https://res.cloudinary.com/dt0pbqivj/image/upload/v1702101683/Clasica_zlmovf.jpg',
            'descripcion' => 'JAMÓN, CHOCLO Y MOZZARELLA.',
            'tamano_id' => $pequeño->id,
            'categoria_id' => $normales->id
        ]);

        Pizza::create([
            'nombre' => 'MARGARITA - GRANDE',
            'precio' => 40.00,
            'imagen_url' => 'https://res.cloudinary.com/dt0pbqivj/image/upload/v1702101683/Margarita_e5usaj.jpg',
            'descripcion' => 'TOMATE Y MOZZARELLA.',
            'tamano_id' => $grande->id,
            'categoria_id' => $normales->id
        ]);

        Pizza::create([
            'nombre' => 'MARGARITA - PEQUEÑA',
            'precio' => 22.00,
            'imagen_url' => 'https://res.cloudinary.com/dt0pbqivj/image/upload/v1702101683/Margarita_e5usaj.jpg',
            'descripcion' => 'TOMATE Y MOZZARELLA.',
            'tamano_id' => $pequeño->id,
            'categoria_id' => $normales->id
        ]);

        Pizza::create([
            'nombre' => 'ECONÓMICA - GRANDE',
            'precio' => 38.00,
            'imagen_url' => 'https://res.cloudinary.com/dt0pbqivj/image/upload/v1702101684/Economica_noy7za.jpg',
            'descripcion' => 'MOZZARELLA Y ORÉGANO.',
            'tamano_id' => $grande->id,
            'categoria_id' => $normales->id
        ]);

        Pizza::create([
            'nombre' => 'ECONÓMICA - PEQUEÑA',
            'precio' => 22.00,
            'imagen_url' => 'https://res.cloudinary.com/dt0pbqivj/image/upload/v1702101684/Economica_noy7za.jpg',
            'descripcion' => 'MOZZARELLA Y ORÉGANO.',
            'tamano_id' => $pequeño->id,
            'categoria_id' => $normales->id
        ]);
    }
}
