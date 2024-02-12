<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenghitunganGaji extends Model
{
    use HasFactory;

    protected $fillable = [
        'periode',
        'tanggal',
        'kode_nik',
        'jumlah_hadir',
        'gaji_pokok',
        'insentif',
        'pot_asuransi',
        'total_gaji',
    ];

    protected $casts = [
        'tanggal' => 'date', // Meng-cast kolom tanggal sebagai tipe date
    ];
}
