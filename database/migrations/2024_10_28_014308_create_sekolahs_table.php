<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('sekolah', function (Blueprint $table) {
            $table->id(); // id otomatis menjadi unsignedBigInteger
            $table->string('nama_sekolah');
            $table->text('alamat');
            $table->string('telepon', 20);
            $table->string('email')->unique();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sekolah');
    }
}
;