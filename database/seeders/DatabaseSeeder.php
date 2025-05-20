<?php

namespace Database\Seeders;

use App\Models\Industri;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Jalankan seeder siswa
        $this->call(SiswaSeeder::class);
        $this->call(GuruSeeder::class);
        $this->call(IndustriSeeder::class);
    }
}
