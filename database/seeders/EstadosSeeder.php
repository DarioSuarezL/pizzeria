<?php

namespace Database\Seeders;

use App\Models\Estado;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EstadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Estado::create(['nombre' => 'Carrito']);
        Estado::create(['nombre' => 'En preparación']);
        Estado::create(['nombre' => 'Enviado']);
        Estado::create(['nombre' => 'Recibido']);
    }
}
