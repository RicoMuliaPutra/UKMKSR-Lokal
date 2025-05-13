<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('galeri', function (Blueprint $table) {
            $table->id('id_galeri');
            $table->unsignedBigInteger('id_jenis_galeri');
            $table->string('foto_galeri')->nullable();
            $table->string('video_galeri')->nullable();
            $table->enum('status', ['aktif', 'tidak'])->default('aktif');
            $table->timestamps();

            $table->foreign('id_jenis_galeri')->references('id_jenis_galeri')->on('jenis_galeri')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('galeri');
    }
};
