<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;

    protected $primaryKey = 'kode_nik'; // Menentukan primary key
    public $incrementing = false; // Jangan menggunakan incrementing untuk primary key kode_nik
    protected $keyType = 'string'; // Tipe data primary key

    protected $fillable = [
        'kode_nik', 'nama_lengkap', 'jabatan', 'gaji_pokok', 'insentif',
    ];

    protected $casts = [
        'gaji_pokok' => 'decimal:2', // Meng-cast gaji_pokok sebagai desimal dengan 2 digit di belakang koma
        'insentif' => 'decimal:2', // Meng-cast insentif sebagai desimal dengan 2 digit di belakang koma
    ];
}
