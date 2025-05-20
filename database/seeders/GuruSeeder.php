<?php

namespace Database\Seeders;

use App\Models\Guru;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Kosongkan tabel guru dulu
        DB::table('guru')->truncate();

        $guru = [
            [
                'nama' => 'Sugiarto, S.T.',
                'nip' => '197203172005011012',
                'gender' => 'L',
                'alamat' => 'Klaten',
                'kontak' => '085643188811',
                'email' => 'sugiarto@sija.com',
            ],
            [
                'nama' => 'Yunianto Hermawan, S.Kom',
                'nip' => '197306202006041005',
                'gender' => 'L',
                'alamat' => 'Klaten',
                'kontak' => '081548734649',
                'email' => 'yunianto@sija.com',
            ],
            [
                'nama' => 'Eka Nur Ahmad Romadhoni, S.Pd.',
                'nip' => '199303012019031011',
                'gender' => 'L',
                'alamat' => 'Klaten',
                'kontak' => '085895780078',
                'email' => 'ekanur@sija.com',
            ],
            [
                'nama' => 'Margaretha Endah Titisari, S.T.',
                'nip' => '197403022006042008',
                'gender' => 'P',
                'alamat' => 'Pokoh, Maguwoharjo',
                'kontak' => '085608990027',
                'email' => 'endah@sija.com',
            ],
            [
                'nama' => 'Rr. Retna Trimantaraningsih, S.T.',
                'nip' => '197006272021212002',
                'gender' => 'P',
                'alamat' => 'Denggung',
                'kontak' => '0856436402427',
                'email' => 'rereretna@sija.com',
            ],
            [
                'nama' => 'Ratna Yunita Sari, S.T.',
                'nip' => '197107082022211003',
                'gender' => 'P',
                'alamat' => 'Yogyakarta',
                'kontak' => '085228771506',
                'email' => 'ratnasari@sija.com',
            ],
        ];

        Guru::insert($guru);
    }
}
