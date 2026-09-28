<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasantri extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'nim', 'telepon'];

    // Relasi BelongsTo ke User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
