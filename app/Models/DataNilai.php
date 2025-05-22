<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class DataNilai extends Model
{
    protected $table = 'nilai_anggota';
    protected $primaryKey = 'anggota_id';

    public $incrementing = false;
    protected $keyType = 'int';

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
            return self::select(
            'nilai_anggota.anggota_id',
            'nilai_anggota.nilai_kehadiran',
            'nilai_anggota.nilai_kontribusi',
            'nilai_anggota.nilai_kompetensi',
            'nilai_anggota.nilai_etika'
        )
        ->join('anggota', 'anggota.id', '=', 'nilai_anggota.anggota_id')
        ->where('anggota.status', 'aktif')
        ->whereNotNull('nilai_anggota.nilai_kehadiran')
        ->whereNotNull('nilai_anggota.nilai_kontribusi')
        ->whereNotNull('nilai_anggota.nilai_kompetensi')
        ->whereNotNull('nilai_anggota.nilai_etika')
        ->orderBy('anggota.angkatan', 'desc')
        ->get()
        ->toArray();
    }    

    public static function getDataNilai($search = null)
    {
        $query = DataNilai::with('anggota')
            ->whereHas('anggota', function ($q) use ($search) {
                $q->where('status', 'aktif');

                if ($search) {
                    $q->where('nama', 'LIKE', "%$search%");
                }
            })
            ->latest();

        return $query->paginate(10)->withQueryString();
    }

    public function anggota()
    {
        return $this->belongsTo(Anggota::class);
    }
}
