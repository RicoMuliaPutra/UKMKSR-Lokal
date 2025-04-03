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
            'foto_kegiatan' => 'kegiatan/1743508773_delegai2.jpg',  
            'poster_kegiatan' => 'kegiatan/1743508773_delegai3.jpg',  
            'status' => 'tidak',
        ]);

        Kegiatan::create([
            'nama_kegiatan' => 'Diklat batch 2',
            'deskripsi_kegiatan' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin semper ullamcorper posuere. Aliquam ullamcorper ante purus, eu viverra nisi convallis a.',
            'foto_kegiatan' => 'kegiatan/1743508773_delegai2.jpg', 
            'poster_kegiatan' => 'kegiatan/1743508773_delegai3.jpg', 
            'status' => 'tidak',
        ]);
    }
}
