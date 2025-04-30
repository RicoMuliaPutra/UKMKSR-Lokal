<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('kegiatan', function (Blueprint $table) {
            $table->id('id_kegiatan');
            $table->string('nama_kegiatan');
            $table->text('deskripsi_kegiatan')->nullable();
            $table->string('foto_kegiatan')->nullable();
            $table->string('poster_kegiatan')->nullable();
            $table->enum('status', ['aktif', 'tidak'])->default('tidak');
            $table->date('start_kegiatan')->nullable();
            $table->date('end_kegiatan')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('kegiatan');
    }
};
