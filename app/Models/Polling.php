<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Polling extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'user_id'];

    public function options()
    {
        return $this->hasMany(PollingOption::class);
    }

    public function admin()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function answers()
    {
        return $this->hasMany(PollingAnswer::class);
    }

}
