<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';

    protected $fillable = [
        'id_barang',
        'id_sekolah',
        'tanggal_transaksi',
        'jumlah',
        'jenis_transaksi',
        'keterangan',
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'id_barang');
    }

    public function sekolah()
    {
        return $this->belongsTo(Sekolah::class, 'id_sekolah');
    }
}
