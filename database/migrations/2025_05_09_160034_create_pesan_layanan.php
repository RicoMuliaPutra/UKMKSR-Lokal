<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pesan_layanan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_layanan'); // buat kolomnya dulu
            $table->foreign('id_layanan')             // baru buat foreign key manual
                  ->references('id_layanan')
                  ->on('layanan')
                  ->onDelete('cascade');
            $table->string('nama');
            $table->string('asal');
            $table->string('nama_kegiatan');
            $table->string('surat_sph')->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesan_layanan');
    }
};
