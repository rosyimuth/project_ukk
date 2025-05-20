<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Industri extends Model
{
    protected $table = 'industri';

    protected $fillable = ['foto_industri', 'nama', 'bidang_usaha', 'alamat', 'kontak', 'email', 'website'];
    public function pkl() {
        return $this->hasMany(PKL::class);
    }
}
