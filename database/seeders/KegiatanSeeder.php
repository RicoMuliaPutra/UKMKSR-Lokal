<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kegiatan;

class KegiatanSeeder extends Seeder
{
    public function run(): void
    {
        Kegiatan::create([
            'nama_kegiatan' => 'Diklat',
            'deskripsi_kegiatan' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin semper ullamcorper posuere. Aliquam ullamcorper ante purus, eu viverra nisi convallis a.',
            'foto_kegiatan' => 'kegiatan/foto/diklat.jpg',
            'poster_kegiatan' => 'kegiatan/diklat2.jpg',
            'start_kegiatan' => '2025-01-29',
            'end_kegiatan' => '2025-02-10',
            'status' => 'aktif',
        ]);

        Kegiatan::create([
            'nama_kegiatan' => 'Diklat Lapang',
            'deskripsi_kegiatan' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin semper ullamcorper posuere. Aliquam ullamcorper ante purus, eu viverra nisi convallis a.',
            'foto_kegiatan' => 'kegiatan/foto/diklat_batch_2.jpg',
            'poster_kegiatan' => 'kegiatan/1743508773_delegai3.jpg',
            'start_kegiatan' => '2025-02-28',
            'end_kegiatan' => '2025-03-10',
            'status' => 'tidak',
        ]);
    }
}
