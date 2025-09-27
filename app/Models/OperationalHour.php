<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OperationalHour extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'day',
        'open_time',
        'close_time',
        'is_closed',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
