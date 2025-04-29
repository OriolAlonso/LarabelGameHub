<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Plataforma;
use App\Models\Joc;
use App\Models\UsuariJoc;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name' => 'AdminOriol',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'is_admin' => true,
        ]);/*
        Plataforma::create([
            'nom' => 'PC',
        ]);
        Plataforma::create([
            'nom' => 'PS5',
        ]);
        Plataforma::create([
            'nom' => 'XBOX',
        ]);*/
    }
}
