<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'username',
        'email',
        'password',
        'role_id',
    ];

    protected $hidden = [
        'password',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    // Relasi aspirasi yang diajukan warga
    public function aspirasiWarga()
    {
        return $this->hasMany(Aspirasi::class, 'warga_id');
    }

    // Relasi aspirasi yang ditangani PD
    public function aspirasiPd()
    {
        return $this->hasMany(Aspirasi::class, 'pd_id');
    }
}
