<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\anggota;


class anggotaSeeder extends Seeder
{
    public function run(): void
    {
        anggota::create([
            'nim' => 'E41221500',
            'nama' => 'Muhammad Dhani',
            'tanggal_lahir' => '2003-01-29',
            'alamat' => 'jember Utara',
            'alasan_join' => 'nyari Pacar',
            'angkatan' => '13',
            'foto' => 'foto-anggota/hilmi.jpg',
            'jurusan' => 'Teknologi Informasi',
            'prodi' => 'Teknik Informatika',
            'status' => 'aktif',
            'tahun_masuk_kuliah' => '2022',
            'jenis_kelamin' => 'laki-laki',
        ]);
    }
}
