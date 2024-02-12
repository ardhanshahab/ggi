<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailPermintaan extends Model
{
    protected $fillable = ['permintaan_id', 'nama_barang', 'kuantiti', 'keterangan', 'status'];

    public function permintaan()
    {
        return $this->belongsTo(Permintaan::class);
    }

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'nama_barang', 'kode_barang');
    }
}
