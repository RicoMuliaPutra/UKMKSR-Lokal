<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    public $fillable = [
        "title",
        "description",
        "images",
        'created_at',
    ];
    protected $casts = [
        'created_at' => 'datetime:Y-m-d',
    ];
    // public $timestamps = false;
    public $timestamps = false;
}
