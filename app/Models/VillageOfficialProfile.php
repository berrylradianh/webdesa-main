<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VillageOfficialProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'position_id',
        'name',
        'nik',
        'photo',
        'phone',
        'email',
        'address',
    ];

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke Position
    public function position()
    {
        return $this->belongsTo(Position::class);
    }
}
