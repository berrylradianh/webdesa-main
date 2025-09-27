<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PollingOption extends Model
{
    use HasFactory;

    protected $fillable = ['polling_id', 'option_text', 'votes'];

    public function polling()
    {
        return $this->belongsTo(Polling::class);
    }

    public function answers()
    {
        return $this->hasMany(PollingAnswer::class, 'option_id');
    }

}
