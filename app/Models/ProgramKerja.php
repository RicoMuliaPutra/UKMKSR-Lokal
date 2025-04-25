<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramKerja extends Model
{
    use HasFactory;
    protected $table = 'program_kerja';

    protected $fillable = ['nama_program', 'deskripsi', 'jabatan_id'];

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class);
    }

    public function pengurusProgramKerja()
    {
        return $this->hasMany(PengurusProgramKerja::class);
    }

    public function pengurus()
    {
        return $this->belongsToMany(Pengurus::class, 'pengurus_program_kerja');
    }
}

