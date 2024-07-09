<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sicKel extends Model
{
    use HasFactory;

    protected $fillable = [        
        'nama',
        'nrp',
        'pangkat',
        'jabatan',
        'kesatuan',
        'diberi_izin_oleh',
        'jenis_cuti',
        'lama_cuti',
        'mulai_tanggal',
        'sd_tanggal',
        'pergi_dari',
        'tujuan_ke',
        'transportasi',
        'pengikut',
        'catatan',
    ];
}
