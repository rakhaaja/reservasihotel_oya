<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payment extends Model
{
    protected $fillable =[
        'nomor_pesan',
        'tanggal_pesan',
        'nama',
        'telepon',
        'metode_pembayaran',
        'harga',
    ];
}
