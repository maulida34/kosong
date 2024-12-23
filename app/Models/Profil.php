<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    // Tentukan tabel yang digunakan
    protected $table = 'profils';

    // Tentukan kolom yang dapat diisi (fillable)
    protected $fillable = [
        'nama',
        'nim',
        'tgl_lahir',
        'email',
        'no_hp',
        'github',
        'alamat'
    ];
}