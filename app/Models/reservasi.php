<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reservasi extends Model
{
    protected $fillable=[
        'nomor_kamar',
        'nama',
        'telepon',
        'tipe_kamar',
        'jumlah_kamar',
        'check_in',
        'check_out'
    ];
}
