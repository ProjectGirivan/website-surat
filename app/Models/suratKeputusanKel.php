<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class suratKeputusanKel extends Model
{
    use HasFactory;

    protected $fillable = [        
        'nama',        
        'pangkat',
        'nip',
        'jabatan',
        'kesatuan',
    ];
}
