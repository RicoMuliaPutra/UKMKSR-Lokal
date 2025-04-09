<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VisiMisi extends Model
{
    protected $table = 'visi_misi_ksr';
    protected $primaryKey = 'id_visi_misi_ksr';
    protected $fillable = ['deskripsi_visi_misi_ksr'];
}

