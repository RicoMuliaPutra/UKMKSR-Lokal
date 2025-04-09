<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Layanan;

class LayananSeeder extends Seeder
{
    public function run(): void
    {
        Layanan::create([
            'nama_layanan' => 'Layanan Kesehatan',
            'deskripsi_layanan' => 'Layanan kesehatan untuk masyarakat umum.',
            'foto_layanan' => 'kegiatan/1743508773_delegai2.jpg',
            'poster_layanan' => 'kegiatan/1743508773_delegai3.jpg',
            'status' => 'aktif',
        ]);

        Layanan::create([
            'nama_layanan' => 'Layanan Konsultasi',
            'deskripsi_layanan' => 'Layanan konsultasi dengan ahli terkait.',
            'foto_layanan' => 'kegiatan/1743508773_delegai2.jpg',
            'poster_layanan' => 'kegiatan/1743508773_delegai3.jpg',
            'status' => 'tidak',
        ]);
    }
}

