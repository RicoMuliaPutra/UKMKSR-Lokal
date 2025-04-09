<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sejarah extends Model
{
    protected $table = 'sejarah_ksr';
    protected $primaryKey = 'id_sejarah_ksr';
    protected $fillable = ['deskripsi_ksr'];
}
