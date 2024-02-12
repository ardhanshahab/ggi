<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    // Menentukan primary key
    protected $primaryKey = 'email';

    // Tipe data primary key
    protected $keyType = 'string';

    // Kolom yang dapat diisi secara massal
    protected $fillable = [
        'nama', 'email', 'password', 'role', 'last_login'
    ];

    // Kolom yang disembunyikan
    protected $hidden = [
        'password', 'remember_token',
    ];

    // Casts untuk konversi tipe data
    protected $casts = [
        'last_login' => 'date', // Meng-cast last_login sebagai tipe date
    ];

    // Method untuk mengenkripsi password sebelum disimpan
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
}
