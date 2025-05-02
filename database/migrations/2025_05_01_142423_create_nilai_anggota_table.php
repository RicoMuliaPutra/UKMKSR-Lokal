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
        Schema::create('nilai_anggota', function (Blueprint $table) {
            $table->unsignedBigInteger('anggota_id')->primary();
            $table->integer('nilai_kehadiran')->nullable()->default(0);
            $table->integer('nilai_kompetensi')->nullable()->default(0);
            $table->integer('nilai_kontribusi')->nullable()->default(0);
            $table->integer('nilai_etika')->nullable()->default(0);
            $table->integer('cluster')->nullable();
        
            $table->timestamps();
        
            $table->foreign('anggota_id')->references('id')->on('anggota');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilai_anggota');
    }
};
