<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('tentang_ksr', function (Blueprint $table) {
            $table->id('id_tentang_ksr');
            $table->text('deskripsi_ksr');
            $table->timestamps();
        });

        Schema::create('info_ksr', function (Blueprint $table) {
            $table->id('id_info_ksr');
            $table->string('link_yt_info_ksr');
            $table->timestamps();
        });

        Schema::create('sejarah_ksr', function (Blueprint $table) {
            $table->id('id_sejarah_ksr');
            $table->text('deskripsi_ksr');
            $table->timestamps();
        });

        Schema::create('visi_misi_ksr', function (Blueprint $table) {
            $table->id('id_visi_misi_ksr');
            $table->text('deskripsi_visi_misi_ksr');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tentang_ksr');
        Schema::dropIfExists('info_ksr');
        Schema::dropIfExists('sejarah_ukm');
        Schema::dropIfExists('visi_misi_ksr');
    }
};

