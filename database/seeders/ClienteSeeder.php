<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Cliente;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $user1 = User::create([
            'name' => 'Cliente 1',
            'email' => 'cliente1@gmail.com',
            'password' => bcrypt('12345678'),
            'is_admin' => false
        ]);

        Cliente::create([
            'ci_nit' => '12345678',
            'user_id' => $user1->id,
            'numeroTelf' => '12345678',
            'direccion' => 'Calle 1'
        ]);

        $user2 = User::create([
            'name' => 'Cliente 2',
            'email' => 'cliente2@gmail.com',
            'password' => bcrypt('12345678'),
            'is_admin' => false
        ]);

        Cliente::create([
            'ci_nit' => '12345678',
            'user_id' => $user2->id,
            'numeroTelf' => '12345678',
            'direccion' => 'Calle 2'
        ]);

        $user3 = User::create([
            'name' => 'Cliente 3',
            'email' => 'cliente3@gmail.com',
            'password' => bcrypt('12345678'),
            'is_admin' => false
        ]);

        Cliente::create([
            'ci_nit' => '12345678',
            'user_id' => $user3->id,
            'numeroTelf' => '12345678',
            'direccion' => 'Calle 3'
        ]);
    }
}
