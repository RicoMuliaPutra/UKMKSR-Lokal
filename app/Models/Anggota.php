<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    protected $table = 'anggota';
    use HasFactory;
    public $fillable = [
        "nim",
        "nama",
        "tanggal_lahir",
        "angkatan",
        "alasan_join",
        "jurusan",
        "prodi",
        "status",
        "tahun_masuk_kuliah",
        "jenis_kelamin",
        "foto",
        "alamat",
        'created_at',
    ];

    public function pengurus()
    {
        return $this->hasMany(Pengurus::class);

    }

    public function dataNilai(){
        return $this->hasMany(DataNilai::class);
    }
}
