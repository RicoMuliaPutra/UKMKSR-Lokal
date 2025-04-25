<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengurusProgramKerja extends Model
{
    use HasFactory;
    protected $table = 'pengurus_program_kerja';

    protected $fillable = ['pengurus_id', 'program_kerja_id'];

    public function pengurus()
    {
        return $this->belongsTo(Pengurus::class);
    }

    public function programKerja()
    {
        return $this->belongsTo(ProgramKerja::class);
    }
}

