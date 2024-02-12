<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mitra extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_nik',
        'id_departement',
    ];

    public function departement()
    {
        return $this->belongsTo(Departement::class, 'id_departement', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_nik', 'nik');
    }

}
