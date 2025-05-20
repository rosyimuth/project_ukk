<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';

    protected $fillable = ['foto_siswa', 'nama', 'nis', 'gender', 'alamat', 'kontak', 'email', 'kelas', 'status_lapor_pkl'];
    public function pkl() {
        return $this->hasMany(PKL::class);
    }
    // Accessor untuk keterangan gender
    public function getKetGenderAttribute()
    {
        return DB::selectOne("SELECT ketGender(?) AS hasil", [$this->gender])->hasil ?? '-';
    }

    // Accessor untuk keterangan kelas
    public function getKetKelasAttribute()
    {
        return DB::selectOne("SELECT ketKelas(?) AS hasil", [$this->kelas])->hasil ?? '-';
    }

    // Accessor untuk keterangan status PKL
    public function getKetStatusLaporPKLAttribute()
    {
        return $this->status_lapor_pkl ? true : false;
    }
}
