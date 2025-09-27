<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PollingAnswer extends Model
{
    use HasFactory;

    protected $fillable = ['polling_id', 'option_id', 'user_id', 'nik', 'name'];

    public function polling()
    {
        return $this->belongsTo(Polling::class);
    }

    public function option()
    {
        return $this->belongsTo(PollingOption::class, 'option_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
