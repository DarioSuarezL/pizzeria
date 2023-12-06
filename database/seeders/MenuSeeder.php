<?php

namespace Database\Seeders;

use App\Models\Categoria;
use App\Models\Pizza;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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

        //pizzas especiales
        Pizza::create([
            'nombre' => 'CHESSEBURGER - GRANDE',
            'precio' => 56.00,
            'imagen_url' => 'https://.jpg',
            'descripcion' => 'CARNE MOLIDA, TOCINO Y CHEDDAR.',
            'tamano' => 'Grande',
            'categoria_id' => $premium->id
        ]);

        Pizza::create([
            'nombre' => 'CHESSEBURGER - PEQUEÑA',
            'precio' => 32.00,
            'imagen_url' => 'https://.jpg',
            'descripcion' => 'CARNE MOLIDA, TOCINO Y CHEDDAR.',
            'tamano' => 'Pequeña',
            'categoria_id' => $premium->id
        ]);

        Pizza::create([
            'nombre' => '4 QUESOS - GRANDE',
            'precio' => 56.00,
            'imagen_url' => 'https://.jpg',
            'descripcion' => 'MOZZARELLA, CHEDDAR, REQUESÓN Y ROQUEFORT.',
            'tamano' => 'Grande',
            'categoria_id' => $premium->id
        ]);

        Pizza::create([
            'nombre' => '4 QUESOS - PEQUEÑA',
            'precio' => 32.00,
            'imagen_url' => 'https://.jpg',
            'descripcion' => 'MOZZARELLA, CHEDDAR, REQUESÓN Y ROQUEFORT.',
            'tamano' => 'Pequeña',
            'categoria_id' => $premium->id
        ]);

        Pizza::create([
            'nombre' => 'STROGONOFF - GRANDE',
            'precio' => 54.00,
            'imagen_url' => 'https://.jpg',
            'descripcion' => 'POLLO, JAMÓN, PAPAS FRITAS Y MOZZARELLA.',
            'tamano' => 'Grande',
            'categoria_id' => $premium->id
        ]);

        Pizza::create([
            'nombre' => 'STROGONOFF - PEQUEÑA',
            'precio' => 30.00,
            'imagen_url' => 'https://.jpg',
            'descripcion' => 'POLLO, JAMÓN, PAPAS FRITAS Y MOZZARELLA.',
            'tamano' => 'Pequeña',
            'categoria_id' => $premium->id
        ]);

        Pizza::create([
            'nombre' => 'CARNIVORA - GRANDE',
            'precio' => 54.00,
            'imagen_url' => 'https://.jpg',
            'descripcion' => 'CARNE MOLIDA, JAMÓN, CHOCLO Y CHEDDAR.',
            'tamano' => 'Grande',
            'categoria_id' => $premium->id
        ]);

        Pizza::create([
            'nombre' => 'CARNIVORA - PEQUEÑA',
            'precio' => 30.00,
            'imagen_url' => 'https://.jpg',
            'descripcion' => 'CARNE MOLIDA, JAMÓN, CHOCLO Y CHEDDAR.',
            'tamano' => 'Pequeña',
            'categoria_id' => $premium->id
        ]);

        Pizza::create([
            'nombre' => 'PERNIL - GRANDE',
            'precio' => 52.00,
            'imagen_url' => 'https://.jpg',
            'descripcion' => 'PERNIL DE CERDO, PIMENTÓN, CHOCLO Y MOZZARELLA.',
            'tamano' => 'Grande',
            'categoria_id' => $premium->id
        ]);

        Pizza::create([
            'nombre' => 'PERNIL - PEQUEÑA',
            'precio' => 28.00,
            'imagen_url' => 'https://.jpg',
            'descripcion' => 'PERNIL DE CERDO, PIMENTÓN, CHOCLO Y MOZZARELLA.',
            'tamano' => 'Pequeña',
            'categoria_id' => $premium->id
        ]);

        Pizza::create([
            'nombre' => '3 QUESOS - GRANDE',
            'precio' => 50.00,
            'imagen_url' => 'https://.jpg',
            'descripcion' => 'MOZZARELLA, CHEDDAR Y REQUESÓN.',
            'tamano' => 'Grande',
            'categoria_id' => $premium->id
        ]);

        Pizza::create([
            'nombre' => '3 QUESOS - PEQUEÑA',
            'precio' => 28.00,
            'imagen_url' => 'https://.jpg',
            'descripcion' => 'MOZZARELLA, CHEDDAR Y REQUESÓN.',
            'tamano' => 'Pequeña',
            'categoria_id' => $premium->id
        ]);

        //pizzas ordinarias

        Pizza::create([
            'nombre' => 'CALABRESA - GRANDE',
            'precio' => 48.00,
            'imagen_url' => 'https://.jpg',
            'descripcion' => 'CALABRESA, MOZZARELLA, CHOCLO O ACEITUNAS.',
            'tamano' => 'Grande',
            'categoria_id' => $normales->id
        ]);

        Pizza::create([
            'nombre' => 'CALABRESA - PEQUEÑA',
            'precio' => 26.00,
            'imagen_url' => 'https://.jpg',
            'descripcion' => 'CALABRESA, MOZZARELLA, CHOCLO O ACEITUNAS.',
            'tamano' => 'Pequeña',
            'categoria_id' => $normales->id
        ]);

        Pizza::create([
            'nombre' => 'AMERICANA - GRANDE',
            'precio' => 48.00,
            'imagen_url' => 'https://.jpg',
            'descripcion' => 'HUEVO, TOCINO Y MOZZARELLA.',
            'tamano' => 'Grande',
            'categoria_id' => $normales->id
        ]);

        Pizza::create([
            'nombre' => 'AMERICANA - PEQUEÑA',
            'precio' => 26.00,
            'imagen_url' => 'https://.jpg',
            'descripcion' => 'HUEVO, TOCINO Y MOZZARELLA.',
            'tamano' => 'Pequeña',
            'categoria_id' => $normales->id
        ]);

        Pizza::create([
            'nombre' => 'PEPERONI - GRANDE',
            'precio' => 48.00,
            'imagen_url' => 'https://.jpg',
            'descripcion' => 'PEPERONI Y MOZZARELLA.',
            'tamano' => 'Grande',
            'categoria_id' => $normales->id
        ]);

        Pizza::create([
            'nombre' => 'PEPERONI - PEQUEÑA',
            'precio' => 26.00,
            'imagen_url' => 'https://.jpg',
            'descripcion' => 'PEPERONI Y MOZZARELLA.',
            'tamano' => 'Pequeña',
            'categoria_id' => $normales->id
        ]);

        Pizza::create([
            'nombre' => 'VEGETARIANA - GRANDE',
            'precio' => 48.00,
            'imagen_url' => 'https://.jpg',
            'descripcion' => 'TOMATE, CHAMPIÑONES, PIMENTÓN, CHOCLO Y MOZZARELLA.',
            'tamano' => 'Grande',
            'categoria_id' => $normales->id
        ]);

        Pizza::create([
            'nombre' => 'VEGETARIANA - PEQUEÑA',
            'precio' => 26.00,
            'imagen_url' => 'https://.jpg',
            'descripcion' => 'TOMATE, CHAMPIÑONES, PIMENTÓN, CHOCLO Y MOZZARELLA.',
            'tamano' => 'Pequeña',
            'categoria_id' => $normales->id
        ]);

        Pizza::create([
            'nombre' => 'HAWAIANA - GRANDE',
            'precio' => 46.00,
            'imagen_url' => 'https://.jpg',
            'descripcion' => 'JAMÓN, PIÑA Y MOZZARELLA.',
            'tamano' => 'Grande',
            'categoria_id' => $normales->id
        ]);

        Pizza::create([
            'nombre' => 'HAWAIANA - PEQUEÑA',
            'precio' => 24.00,
            'imagen_url' => 'https://.jpg',
            'descripcion' => 'JAMÓN, PIÑA Y MOZZARELLA.',
            'tamano' => 'Pequeña',
            'categoria_id' => $normales->id
        ]);

        Pizza::create([
            'nombre' => 'CLÁSICA - GRANDE',
            'precio' => 44.00,
            'imagen_url' => 'https://.jpg',
            'descripcion' => 'JAMÓN, CHOCLO Y MOZZARELLA.',
            'tamano' => 'Grande',
            'categoria_id' => $normales->id
        ]);

        Pizza::create([
            'nombre' => 'CLÁSICA - PEQUEÑA',
            'precio' => 24.00,
            'imagen_url' => 'https://.jpg',
            'descripcion' => 'JAMÓN, CHOCLO Y MOZZARELLA.',
            'tamano' => 'Pequeña',
            'categoria_id' => $normales->id
        ]);

        Pizza::create([
            'nombre' => 'MARGARITA - GRANDE',
            'precio' => 40.00,
            'imagen_url' => 'https://.jpg',
            'descripcion' => 'TOMATE Y MOZZARELLA.',
            'tamano' => 'Grande',
            'categoria_id' => $normales->id
        ]);

        Pizza::create([
            'nombre' => 'MARGARITA - PEQUEÑA',
            'precio' => 22.00,
            'imagen_url' => 'https://.jpg',
            'descripcion' => 'TOMATE Y MOZZARELLA.',
            'tamano' => 'Pequeña',
            'categoria_id' => $normales->id
        ]);

        Pizza::create([
            'nombre' => 'ECONÓMICA - GRANDE',
            'precio' => 38.00,
            'imagen_url' => 'https://.jpg',
            'descripcion' => 'MOZZARELLA Y ORÉGANO.',
            'tamano' => 'Grande',
            'categoria_id' => $normales->id
        ]);

        Pizza::create([
            'nombre' => 'ECONÓMICA - PEQUEÑA',
            'precio' => 22.00,
            'imagen_url' => 'https://.jpg',
            'descripcion' => 'MOZZARELLA Y ORÉGANO.',
            'tamano' => 'Pequeña',
            'categoria_id' => $normales->id
        ]);
    }
}
