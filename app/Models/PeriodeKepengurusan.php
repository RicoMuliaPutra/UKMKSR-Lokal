<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeriodeKepengurusan extends Model
{
    use HasFactory;
    protected $table = 'periode_kepengurusan';

    protected $fillable = ['nama_periode', 'tahun_mulai', 'tahun_selesai'];

    public function pengurus()
    {
        return $this->hasMany(Pengurus::class, 'periode_id');
    }
}
