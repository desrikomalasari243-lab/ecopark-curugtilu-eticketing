<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Petugas;

class PetugasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Akun Admin
        Petugas::create([
            'nama_petugas' => 'Admin Utama',
            'email' => 'admin@ecopark.com',
            'password' => bcrypt('password123'),
            'role' => 'admin',
        ]);

        // 2. Akun Petugas Gate
        Petugas::create([
            'nama_petugas' => 'Petugas Gate 1',
            'email' => 'gate@ecopark.com',
            'password' => bcrypt('password123'),
            'role' => 'petugas',
        ]);

        // 3. Akun Manajer
        Petugas::create([
            'nama_petugas' => 'Manajer Area',
            'email' => 'manajer@ecopark.com',
            'password' => bcrypt('password123'),
            'role' => 'manajer',
        ]);
    }
}
