<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    use HasFactory;

    protected $table = 'galeri';

    protected $fillable = ['id_jenis_galeri', 'foto_galeri', 'video_galeri', 'status'];

    public function jenisGaleri()
    {
        return $this->belongsTo(JenisGaleri::class, 'id_jenis_galeri');
    }
}

