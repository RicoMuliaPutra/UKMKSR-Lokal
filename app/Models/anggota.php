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
        "nilai_kehadiran",
        "nilai_kontribusi",
        "nilai_kompetensi",
        "nilai_etika",
        "cluster",
        'created_at',
    ];


    public static function getAnggotaForClusters(){
        $query = self::where('status', 'aktif')
                ->whereNotNull('nilai_kehadiran')
                ->whereNotNull('nilai_kompetensi')
                ->whereNotNull('nilai_kontribusi')
                ->whereNotNull('nilai_etika')
                ->orderBy('angkatan', 'desc');

        return $query->get()->toArray();
    }

    public function pengurus()
    {
        return $this->hasMany(Pengurus::class);

    }
}
