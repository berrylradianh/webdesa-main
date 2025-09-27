<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisiMisi extends Model
{
    use HasFactory;

    protected $table = 'visi_misi';

    protected $fillable = [
        'visi',
        'user_id',
    ];

    protected $casts = [];

    public function misi()
    {
        return $this->hasMany(Misi::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
