<?php

namespace Database\Seeders;

use App\Models\MetodoPago;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MetodoPagosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MetodoPago::create(['nombre' => 'Efectivo']);
        MetodoPago::create(['nombre' => 'Tarjeta de débito/crédito']);
        MetodoPago::create(['nombre' => 'QR']);
    }
}
