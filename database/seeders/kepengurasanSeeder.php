<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Divisi;
use App\Models\jabatan;
use App\Models\PengurusProgramKerja;
use App\Models\PeriodeKepengurusan;
use App\Models\Pengurus;
use App\Models\ProgramKerja;
use App\Models\anggota;

class kepengurasanSeeder extends Seeder
{

    public function run(): void
    {
        // 1. Buat divisi
        $sdm = Divisi::create([
            'nama_divisi' => 'SDM',
            'deskripsi' => 'Divisi Sumber Daya Manusia'
        ]);

        $humas = Divisi::create([
            'nama_divisi' => 'HUMAS',
            'deskripsi' => 'Hubungan Masyarakat'
        ]);

        $Danus = Divisi::create([
            'nama_divisi' => 'DANUS',
            'deskripsi' => 'Dana dan Usaha'
        ]);

        $BPH = Divisi::create([
            'nama_divisi' => 'BPH',
            'deskripsi' => 'Badan Pengurus Harian.'
        ]);

        $logistik = Divisi::create([
            'nama_divisi' => 'logistik',
            'deskripsi' => 'Logistik'
        ]);

        $PKMB = Divisi::create([
            'nama_divisi' => 'PKMB',
            'deskripsi' => 'Pusat Kegiatan Belajar Masyarakat'
        ]);

        // 2. Buat jabatan yang berada di divisi SDM
        $jabatan = Jabatan::create([
            'nama_jabatan' => 'Kearsipan',
            'divisi_id' => $sdm->id
        ]);

        // 3. Buat periode kepengurusan
        $periode = PeriodeKepengurusan::create([
            'nama_periode' => 'Periode 2023',
            'tahun_mulai' => 2023,
            'tahun_selesai' => 2024,
        ]);

        $periode2024 = PeriodeKepengurusan::create([
            'nama_periode' => 'Periode 2024',
            'tahun_mulai' => 2024,
            'tahun_selesai' => 2025,
        ]);

        $periode2022 = PeriodeKepengurusan::create([
            'nama_periode' => 'Periode 2022',
            'tahun_mulai' => 2022,
            'tahun_selesai' => 2023,
        ]);

        // 4. Dummy anggota
        $anggota = Anggota::create([
            'nim' => 'E41221544',
            'nama' => 'Muhammad Khilmi',
            'tanggal_lahir' => '2003-11-29',
            'alamat' => 'Jember',
            'alasan_join' => 'Nyari temen',
            'angkatan' => '14',
            'foto' => 'foto-anggota/hilmi.jpg',
            'jurusan' => 'Teknologi Informasi',
            'prodi' => 'Teknik Informatika',
            'status' => 'aktif',
            'tahun_masuk_kuliah' => '2022',
            'jenis_kelamin' => 'laki-laki',
        ]);

        // 5. Buat pengurus
        $pengurus = Pengurus::create([
            'anggota_id' => $anggota->id,
            'periode_id' => $periode->id,
            'jabatan_id' => $jabatan->id
        ]);

        // 6. Buat program kerja di jabatan yang dibuat
        $programs = [
            'Pengarsipan Digital',
            'Pendidikan Karakter',
            'Pengelolaan Database',
            'Pelatihan Soft Skill'
        ];

        $programKerjas = [];
        foreach ($programs as $prog) {
            $programKerjas[] = ProgramKerja::create([
                'nama_program' => $prog,
                'deskripsi' => 'Deskripsi untuk ' . $prog,
                'jabatan_id' => $jabatan->id
            ]);
        }

        // 7. Relasikan pengurus ke 3 program kerja (random)
        $randomProgramKerjas = collect($programKerjas)->random(3);

        foreach ($randomProgramKerjas as $proker) {
            PengurusProgramKerja::create([
                'pengurus_id' => $pengurus->id,
                'program_kerja_id' => $proker->id,
            ]);
        }
    }
}
