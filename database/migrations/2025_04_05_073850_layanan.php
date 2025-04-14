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
        Schema::create('layanan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_layanan')->nullable();
            $table->longText('deskripsi')->nullable();
            $table->string('foto_layanan')->nullable();
            $table->string('poster_layanan')->nullable();
            $table->enum('status', ['aktif', 'tidak'])->default('tidak');
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
