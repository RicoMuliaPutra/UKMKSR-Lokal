<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    protected $table = 'info_ksr';
    protected $primaryKey = 'id_info_ksr';
    protected $fillable = ['link_yt_info_ksr'];
}

