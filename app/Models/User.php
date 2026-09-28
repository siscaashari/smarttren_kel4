<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Kolom yang diizinkan untuk diisi (mass assignment).
     */
    protected $fillable = [
        'username', 
        'password', 
        'nama', 
        'email', 
        'role', 
        'status'
    ];

    /**
     * Kolom yang disembunyikan saat data diubah ke array/JSON.
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Relasi HasMany ke model Mahasantri.
     */
    public function mahasantris()
    {
        return $this->hasMany(Mahasantri::class);
    }
}