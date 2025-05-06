<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengurus extends Model
{
    use HasFactory;
    protected $table = 'pengurus';

    protected $fillable = ['anggota_id', 'periode_id', 'jabatan_id'];

    public function anggota()
    {
        return $this->belongsTo(Anggota::class);
    }

    public function periode()
    {
        return $this->belongsTo(PeriodeKepengurusan::class, 'periode_id');
    }

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class);
    }

    // Relasi ke ProgramKerja (pengurus memiliki banyak program kerja)
    public function programKerjas()
    {
        return $this->hasManyThrough(ProgramKerja::class, Jabatan::class, 'id', 'jabatan_id', 'jabatan_id', 'id');
    }

}
