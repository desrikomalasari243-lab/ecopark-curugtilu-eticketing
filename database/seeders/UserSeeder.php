<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::create([
            'name' => 'Admin Ecopark',
            'email' => 'admin@ecopark.com',
            'password' => \Illuminate\Support\Facades\Hash::make('password123'),
            'role' => 'admin',
        ]);

        \App\Models\User::create([
            'name' => 'Petugas Gate 1',
            'email' => 'gate@ecopark.com',
            'password' => \Illuminate\Support\Facades\Hash::make('password123'),
            'role' => 'petugas_gate',
        ]);

        \App\Models\User::create([
            'name' => 'Pemilik Ecopark',
            'email' => 'pemilik@ecopark.com',
            'password' => \Illuminate\Support\Facades\Hash::make('password123'),
            'role' => 'pemilik',
        ]);
    }
}
