<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    use HasFactory;
    protected $table = 'layanan';
    protected $primaryKey = 'id_layanan';
    public $timestamps = true;

    protected $fillable = [
        'nama_layanan',
        'deskripsi_layanan',
        'foto_layanan',
        'poster_layanan',
        'status',
    ];

    public function pesanans() {
    return $this->hasMany(PesanLayanan::class, 'id_layanan');
 }

}
