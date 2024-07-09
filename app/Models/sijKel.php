<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sijKel extends Model
{
    use HasFactory;

    protected $fillable = [        
        'nama',
        'nrp',
        'pangkat',
        'jabatan',
        'pengikut',
        'pergi_dari',
        'tujuan_ke',
        'keperluan',
        'berkendaraan',
        'berangkat_tanggal',
        'kembali_tanggal',
        'catatan',
    ];
}
