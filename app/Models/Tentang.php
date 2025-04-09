<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tentang extends Model
{
    protected $table = 'tentang_ksr';
    protected $primaryKey = 'id_tentang_ksr';
    protected $fillable = ['deskripsi_ksr'];
}

