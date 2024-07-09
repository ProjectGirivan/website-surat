<?php

namespace App\Models;

use App\Models\rahasiaKeluar;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class keluarBiasa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomor',
        'klasifikasi',
        'lampiran',
        'hal',
    ];
}
