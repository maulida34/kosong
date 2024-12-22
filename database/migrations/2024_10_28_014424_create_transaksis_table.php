<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_sekolah')->constrained('sekolah'); // Foreign key ke id pada tabel sekolah
            $table->foreignId('id_barang')->constrained('barang'); // Foreign key ke id pada tabel barang
            $table->date('tanggal_transaksi');
            $table->integer('jumlah');
            $table->enum('jenis_transaksi', ['Distribusi', 'Pengembalian']);
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('transaksi');
    }
}
;