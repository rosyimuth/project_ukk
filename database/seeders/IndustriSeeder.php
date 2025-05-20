<?php

namespace Database\Seeders;

use App\Models\Industri;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class IndustriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Kosongkan tabel guru dulu
        DB::table('industri')->truncate();

        $industri = [
            [
                'nama' => 'PT. Gamatechno Indonesia',
                'bidang_usaha' => 'Software House',
                'alamat' => 'Jalan Purwomartani, Kalasan',
                'kontak' => '0274566161',
                'email' => 'info@gamatechno.com',
                'website' => 'https://gamatecho.com',
            ],
            [
                'nama' => 'PT. Citraweb Solusi Teknologi',
                'bidang_usaha' => 'Internet Service Provider',
                'alamat' => 'Jalan Magelang, Sleman',
                'kontak' => '02746059988',
                'email' => 'info@citraweb.com',
                'website' => 'https://citraweb.com',
            ],
            [
                'nama' => 'PT. Botika Teknologi Indonesia',
                'bidang_usaha' => 'Chatbot AI',
                'alamat' => 'Jalan Perumnas, Sleman',
                'kontak' => '081802207000',
                'email' => 'hrd@botika.online',
                'website' => 'https://botika.online',
            ],
            [
                'nama' => 'PT. SaranaInsan MudaSelaras (Life Media)',
                'bidang_usaha' => 'Multimedia',
                'alamat' => 'Jalan Parangtritis, Yogyakarta',
                'kontak' => '02746055655',
                'email' => 'cs@lifemedia.id',
                'website' => 'https://lifemedia.id',
            ],
        ];

        Industri::insert($industri);
    }
}
