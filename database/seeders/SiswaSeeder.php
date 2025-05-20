<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Kosongkan tabel siswa dulu
        DB::table('siswa')->truncate();
        $siswa = [
            ["20388", "ABU BAKAR TSABIT GHUFRON", "L"],
            ["20389", "ADE RAFIF DANESWARA", "L"],
            ["20390", "ADE ZAIDAN ALTHAF", "L"],
            ["20391", "ADHWA KHALILA RAMADHANI", "P"],
            ["20392", "ADNAN FARIS", "L"],
            ["20393", "AHMAD HANAFFI RAHMADHANI", "L"],
            ["20394", "AKBAR AD'HA KUSUMAWARDHANA", "L"],
            ["20395", "ANDHIKA AUGUST FARNAZ", "L"],
            ["20396", "ANGELINA THITHIS SEKAR LANGIT", "P"],
            ["20397", "ARIFIN NUR IHSAN", "L"],
            ["20398", "ARYA EKA RAHMAT PRASETYO", "L"],
            ["20399", "ATHIYYA HANIIFA", "P"],
            ["20400", "AULIA MAHARANI", "P"],
            ["20401", "BIJAK PUTRA FIRMANSYAH", "L"],
            ["20402", "CHRISTIAN JAROT FERDIANNDARU", "L"],
            ["20403", "DAFFA ARYA SETA", "L"],
            ["20404", "DIMAS BAGUS AHMAD NURYASIN", "L"],
            ["20405", "EKALAYA KEMAL PASHA", "L"],
            ["20406", "FADLY ATHALLA FAWWAZ", "L"],
            ["20407", "FARADILLA SYIFA NURAINI", "P"],
            ["20408", "FARCHA AMALIA NUGRAHAINI", "P"],
            ["20409", "FAUZAN ADZIMA KURNIAWAN", "L"],
            ["20410", "GABRIEL POSSENTI GENTA BAHANA NAGARI", "L"],
            ["20411", "GILANG NURHUDA", "L"],
            ["20412", "GISELO KRISTIYANTO", "L"],
            ["20413", "ILHAM PUTRA MAHENDRA", "L"],
            ["20414", "INTAN LUVIA HISANAH", "P"],
            ["20415", "ISNAINI NUR WAHYUNINGSIH", "P"],
            ["20416", "IZZUDDIN FAYYEDH HAQ", "L"],
            ["20417", "JARDELLA ANGGUN LAVATEKTONIA", "P"],
            ["20418", "JECONIA VALE ADYATMA", "L"],
            ["20419", "KAYSA AQILA AMTA", "P"],
            ["20420", "KEVIN ANDREA GERALDINO", "L"],
            ["20421", "LAURENTIUS DAVIANO MAXIMUS ANTARA", "L"],
            ["20422", "MARCELLINUS CHRISTO PRADIPTA", "L"],
            ["20423", "MEIDINNA TIARA PRAMUDHITA", "P"],
            ["20424", "MEYLANI TRI NUR DIAH", "P"],
            ["20425", "MUH BENI ABDULLAH", "L"],
            ["20426", "MUHAMMAD AKBAR AMAANULLAAH", "L"],
            ["20427", "MUHAMMAD FAIRUZIZUAN AZZURI", "L"],
            ["20428", "MUHAMMAD NAQSYABAND EFFENDI", "L"],
            ["20429", "MUHAMMAD RAFI ANSHORY", "L"],
            ["20430", "MUHAMMAD RAFLI QAIDUL NADHIF", "L"],
            ["20431", "MUTIARA SEKAR KINASIH", "P"],
            ["20432", "NABILA NUR AZIZAH", "P"],
            ["20433", "NAFISYA RHEA PRAYASTI", "P"],
            ["20434", "NAUFELIRNA SUBKHI RAMADHANI", "P"],
            ["20435", "NAUVAL AT-THARIQ", "L"],
            ["20436", "NOVERYAN PUTRA PAMUNGKAS", "L"],
            ["20437", "NUR CHESYA PUSPITASARI", "P"],
            ["20438", "NUR RAHMAN RIFAI", "L"],
            ["20439", "NUR RAMADHANI SAPUTRA", "L"],
            ["20440", "NUR RIJALUL ANNAM", "L"],
            ["20441", "PEMBAYUN MAYA RIYANI", "P"],
            ["20442", "RADEN SATRIA AJI PAMUNGKAS", "L"],
            ["20443", "RAFA ALI KHOMAINI", "L"],
            ["20444", "RAFA ANAN WARDANA", "L"],
            ["20445", "REYQAL KHAIRULLAH RINDUWAN", "L"],
            ["20446", "REZA FARKIH", "L"],
            ["20447", "RIENTANIA WAFANISA SARWADITA", "P"],
            ["20449", "ROBERTHO DARRELL", "L"],
            ["20448", "ROSYIDAH MUTHMAINNAH", "P"],
            ["20450", "SABIAN RAKA PRAMUDITYA", "L"],
            ["20451", "SALWA AZ-ZAHRA MIZAR", "P"],
            ["20452", "SHAFWAN ILHAM DZAKY", "L"],
            ["20453", "SURYA ANDHIKA PUTRI", "P"],
            ["20454", "THARA BUNGA NOVRIYANSYAH", "P"],
            ["20455", "TSABITA IRENE ADIELIA", "P"],
            ["20456", "VINCENTIUS REYNARA EZRATAMA", "L"],
            ["20457", "YOHANES FAREL KRISTIAWAN", "L"],
            ["20458", "YUMNA PUTRI NURJANAH", "P"],
            ["20459", "ZULAYKHA KUSUMA WARDHANI", "P"],
        ];

        foreach ($siswa as $index => $s) {
            DB::table('siswa')->insert([
                'foto_siswa' => null,
                'nis' => $s[0],
                'nama' => $s[1],
                'gender' => $s[2],
                'kelas' => $index <= 35 ? 'A' : 'B', // Meidinna ke atas = A, Meylani ke bawah = B
                'alamat' => 'Yogyakarta',
                'kontak' => '08' . rand(1000000000, 9999999999),
                'email' => $s[0] . '@sija.com',
                'status_lapor_pkl' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}