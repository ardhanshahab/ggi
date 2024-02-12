<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departement extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_departement',
        'lokasi_departement',

    ];
    public $timestamps = false;

    public function mitra()
    {
        return $this->hasOne(Mitra::class, 'id_departement', 'id');
    }
}
