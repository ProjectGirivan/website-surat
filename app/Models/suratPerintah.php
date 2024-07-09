<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class suratPerintah extends Model
{
    use HasFactory;

    protected $fillable = [                
        'dasar',
        'kepada',
    ];
}
