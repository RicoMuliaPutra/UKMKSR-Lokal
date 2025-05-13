<?php

namespace App\Imports;

use App\Models\Anggota;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AnggotaImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Anggota([
            'nim' => $row['nim'],
            'nama' => $row['nama'],
            'tanggal_lahir' => $row['tanggal_lahir'],
            'angkatan' => $row['angkatan'],
            'alasan_join' => $row['alasan_join'],
            'jurusan' => $row['jurusan'],
            'prodi' => $row['prodi'],
            'status' => $row['status'],
            'tahun_masuk_kuliah' => $row['tahun_masuk_kuliah'],
            'jenis_kelamin' => $row['jenis_kelamin'],
            'alamat' => $row['alamat'],
        ]);
    }
}
