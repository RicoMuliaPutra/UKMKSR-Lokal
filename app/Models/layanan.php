<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class layanan extends Model
{
    use HasFactory;
    protected $table = 'layanan';

    protected $fillable = [
        'nama_layanan',
        'deskripsi',
        'foto_layanan',
        'poster_layanan',
        'status',
    ];

}
