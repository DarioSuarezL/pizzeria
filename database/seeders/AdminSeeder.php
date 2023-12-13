<?php

namespace Database\Seeders;

use App\Models\Cliente;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dario = User::create([
            'name' => 'Dario Suarez Lazarte',
            'email' => 'dsuarezlazarte@gmail.com',
            'password' => bcrypt('12345678'),
            'is_admin' => true
        ]);

        Cliente::create([
            'ci_nit' => 'SIN NIT',
            'user_id' => $dario->id,
            'numeroTelf' => '65085392',
            'direccion' => 'Av. Moscú Barrio Rivero, Calle Gaviota #18'
        ]);

        User::create([
            'name' => 'Jorge Ballivian Ocampo',
            'email' => 'jorge@gmail.com',
            'password' => bcrypt('12345678'),
            'is_admin' => true
        ]);

        User::create([
            'name' => 'Alison Tacoo Maturano',
            'email' => 'alison@gmail.com',
            'password' => bcrypt('12345678'),
            'is_admin' => true
        ]);
    }
}
