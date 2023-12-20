<?php

namespace Database\Seeders;

use App\Models\PagoEstado;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PagoEstadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PagoEstado::create(['nombre' => 'PENDIENTE/EN PROCESO']);
        PagoEstado::create(['nombre' => 'PAGADO']);
        PagoEstado::create(['nombre' => 'REVERTIDO']);
        PagoEstado::create(['nombre' => 'ANULADO']);
    }
}
