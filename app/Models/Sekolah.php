<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sekolah extends Model
{
    use HasFactory;

    protected $table = 'sekolah';

    protected $fillable = [
        'nama_sekolah',
        'alamat',
        'telepon',
        'email',
    ];

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'id_sekolah');
    }

    public function stok()
    {
        return $this->hasMany(Stok::class, 'id_sekolah');
    }
}
