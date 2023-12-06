<?php

namespace Database\Seeders;

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
        User::create([
            'name' => 'Dario Suarez Lazarte',
            'email' => 'dsuarezlazarte@gmail.com',
            'password' => bcrypt('12345678'),
            'is_admin' => true
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

        User::create([
            'name' => 'Cliente 1',
            'email' => 'cliente1@gmail.com',
            'password' => bcrypt('12345678'),
            'is_admin' => false
        ]);

        User::create([
            'name' => 'Cliente 2',
            'email' => 'cliente2@gmail.com',
            'password' => bcrypt('12345678'),
            'is_admin' => false
        ]);

        User::create([
            'name' => 'Cliente 3',
            'email' => 'cliente3@gmail.com',
            'password' => bcrypt('12345678'),
            'is_admin' => false
        ]);
    }
}
