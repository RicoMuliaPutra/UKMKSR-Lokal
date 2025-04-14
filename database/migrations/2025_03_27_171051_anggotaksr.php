<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
{
    Schema::create('anggota', function (Blueprint $table) {
        $table->id();
        $table->string('nim')->unique();
        $table->string('nama')->nullable();
        $table->date('tanggal_lahir')->nullable();
        $table->string('alamat')->nullable();
        $table->longText('alasan_join')->nullable();
        $table->Integer('angkatan')->nullable();
        $table->string('foto')->nullable();
        $table->string('jurusan')->nullable();
        $table->string('prodi')->nullable();
        $table->enum('status', ['Aktif', 'Tidak Aktif', 'Inaktif']);
        $table->year('tahun_masuk_kuliah')->nullable();
        $table->enum('jenis_kelamin', ['laki-laki', 'perempuan']);
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
