<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {

        Schema::create('divisi', function (Blueprint $table) {
            $table->id();
            $table->string('nama_divisi'); // contoh: "BPH", "SDM", "HUMAS"
            $table->text('deskripsi')->nullable();
            $table->timestamps();
        });

        Schema::create('periode_kepengurusan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_periode');
            $table->year('tahun_mulai');
            $table->year('tahun_selesai')->nullable();
            $table->timestamps();
        });

        Schema::create('program_kerja', function (Blueprint $table) {
            $table->id();
            $table->string('nama_program');
            $table->text('deskripsi')->nullable();
            $table->foreignId('divisi_id')->constrained('divisi')->onDelete('cascade');
            $table->foreignId('periode_id')->constrained('periode_kepengurusan')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('jabatan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_jabatan');// contoh: "Ketua", "Sekretaris", "Koordinator"
            $table->timestamps();
        });

        Schema::create('pengurus', function (Blueprint $table) {
            $table->id();
            $table->foreignId('anggota_id')->constrained('anggota')->onDelete('cascade');
            $table->foreignId('periode_id')->constrained('periode_kepengurusan')->onDelete('cascade');
            $table->foreignId('divisi_id')->constrained('divisi')->onDelete('cascade');
            $table->foreignId('jabatan_id')->constrained('jabatan')->onDelete('cascade');
            $table->timestamps();
        });

    }

    public function down(): void
    {

    }
};
