<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class DataNilai extends Model
{
    protected $table = 'nilai_anggota';
    use HasFactory;
    public $fillable = [
        "anggota_id",
        "nilai_kehadiran",
        "nilai_kontribusi",
        "nilai_kompetensi",
        "nilai_etika",
        "cluster",
        "created_at",
    ];

    public static function getAnggotaForClusters()
    {
        // return self::select('nilai_anggota.*')
        //     ->join('anggota', 'anggota.id', '=', 'nilai_anggota.anggota_id')
        //     ->where('anggota.status', 'aktif')
        //     ->whereNotNull('nilai_anggota.nilai_kehadiran')
        //     ->whereNotNull('nilai_anggota.nilai_kompetensi')
        //     ->whereNotNull('nilai_anggota.nilai_kontribusi')
        //     ->whereNotNull('nilai_anggota.nilai_etika')
        //     ->orderBy('anggota.angkatan', 'desc')
        //     ->get()
        //     ->toArray();
        return self::select('anggota_id', 'nilai_kehadiran', 'nilai_kontribusi', 'nilai_kompetensi', 'nilai_etika')->get()->toArray();
    }    

    public static function getDataNilai($search = null)
    {
        $query = DataNilai::with('anggota')->latest();

        if ($search) {
            $query->whereHas('anggota', function ($q) use ($search) {
                $q->where('nama', 'LIKE', "%$search%");
            });
        }
        

        return $query->paginate(10)->withQueryString();
    }

    public function anggota()
    {
        return $this->belongsTo(Anggota::class);
    }
}
