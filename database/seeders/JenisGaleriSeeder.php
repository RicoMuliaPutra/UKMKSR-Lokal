<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenisGaleriSeeder extends Seeder
{
    public function run()
    {
        // Menambahkan data ke dalam tabel jenis_galeri
        DB::table('jenis_galeri')->insert([
            [
                'nama_jenis_galeri' => 'foto', // Menyimpan jenis galeri untuk foto
            ],
            [
                'nama_jenis_galeri' => 'video', // Menyimpan jenis galeri untuk video
            ],
        ]);
    }
}

