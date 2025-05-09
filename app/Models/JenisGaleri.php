<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisGaleri extends Model
{
    use HasFactory;

    // Tentukan kolom primary key yang digunakan
    protected $primaryKey = 'id_jenis_galeri';

    // Tentukan tabel jika nama tabel tidak sesuai konvensi Laravel
    protected $table = 'jenis_galeri';

    protected $fillable = ['nama_jenis_galeri'];
}


