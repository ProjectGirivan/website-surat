<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class notaDinasKel extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomor_agenda',
        'kepada_yth',
        'surat_dari',
        'nomor_surat_tgl',
        'perihal',
    ];
}
