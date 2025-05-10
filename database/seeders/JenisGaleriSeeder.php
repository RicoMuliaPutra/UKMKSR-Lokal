<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenisGaleriSeeder extends Seeder
{
    public function run()
    {
        DB::table('jenis_galeri')->insert([
            [
                'nama_jenis_galeri' => 'foto',
            ],
            [
                'nama_jenis_galeri' => 'video',
            ],
        ]);
    }
}

