<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('stok', function (Blueprint $table) {
            $table->id('id_stok');
            $table->foreignId('id_sekolah')->constrained('sekolah');
            $table->foreignId('id_barang')->constrained('barang');
            $table->integer('jumlah_stok');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('stok');
    }
}
;
