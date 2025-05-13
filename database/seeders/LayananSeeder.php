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
    public function run(): void {
    Layanan::create([
        'nama_layanan'   => 'TIM KESEHATAN',
        'deskripsi_layanan' => 'Mendukung memenuhi kebutuhan tim kesehatan pada kegiatan terhadap sebuah insiden atau kecelakaan bagi instansi internal.',
        'foto_layanan'   => 'layanan/delegai1.jpg',
        'poster_layanan' => 'layanan/timeline-timkes.jpg',
        'status'         => 'aktif',
    ]);

    Layanan::create([
        'nama_layanan'   => 'FASILITATOR',
        'deskripsi_layanan'  => 'Mendukung memenuhi kebutuhan pemateri pada kegiatan atau assesment yang berkaitan dengan materi kepalang merahan',
        'foto_layanan'   => 'layanan/fasil1.jpg',
        'poster_layanan' => 'layanan/poster.jpg',
        'status'         => 'aktif',
    ]);
}

}
