<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_barang',
        'jenis_barang',
        'kode_barang',
    ];
    public $timestamps = false;

    public function stok()
    {
        return $this->hasOne(Stok::class, 'id_barang', 'id');
    }
}
