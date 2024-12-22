<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'barang';

    protected $fillable = [
        'nama_barang',
        'id_kategori',
        'spesifikasi',
        'kondisi',
        'tanggal_pengadaan',
        'jumlah',
    ];

    public function kategori()
    {
        return $this->belongsTo(KategoriBarang::class, 'id_kategori');
    }

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'id_barang');
    }

    public function stok()
    {
        return $this->hasMany(Stok::class, 'id_barang');
    }
}
