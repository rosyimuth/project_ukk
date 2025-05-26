<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $table = 'guru';

    protected $fillable = ['foto_guru', 'nama', 'nip', 'gender', 'alamat', 'kontak', 'email'];

    // Menambahkan atribut virtual ke hasil JSON
    protected $appends = ['ketGender'];
    public function pkl() {
        return $this->hasMany(PKL::class);
    }

    // Accessor: akan dipanggil saat JSON di-generate
    public function getKetGenderAttribute()
    {
        return DB::selectOne("SELECT ketGender(?) AS hasil", [$this->gender])->hasil ?? '-';
    }
}
