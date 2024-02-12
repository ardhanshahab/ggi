<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class permintaan extends Model
{
    protected $fillable = ['nik', 'tanggal_permintaan'];

    public function detailpermintaan()
    {
        return $this->hasMany(DetailPermintaan::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'nik', 'nik');
    }
}
