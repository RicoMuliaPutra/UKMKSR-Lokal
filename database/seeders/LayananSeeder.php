<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\layanan;


class LayananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Layanan::create([
            'nama_layanan'   => 'TIM KESEHATAN',
            'deskripsi'      => 'Mendukung memenuhi kebutuhan tim kesehatan pada kegiatan terhadap sebuah insiden atau kecelakaan bagi instansi internal.',
            'foto_layanan'   => 'img/delegai1.jpg',
            'poster_layanan' => 'img/poster1.jpg',
            'status'         => 'aktif',
        ]);

        Layanan::create([
            'nama_layanan'   => 'FASILITATOR',
            'deskripsi'      => 'Mendukung memenuhi kebutuhan pemateri pada kegiatan atau assesment yang berkaitan dengan materi kepalang merahan',
            'foto_layanan'   => 'img/fasil1.jpg',
            'poster_layanan' => 'img/poster.jpg',
            'status'         => 'aktif',
        ]);
    }
}
