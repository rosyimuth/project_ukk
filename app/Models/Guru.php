<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $table = 'guru';

    protected $fillable = ['foto_guru', 'nama', 'nip', 'gender', 'alamat', 'kontak', 'email'];
    public function pkl() {
        return $this->hasMany(PKL::class);
    }
        // Accessor untuk keterangan gender
    public function getKetGenderAttribute()
    {
        return DB::selectOne("SELECT ketGender(?) AS hasil", [$this->gender])->hasil ?? '-';
    }
}
