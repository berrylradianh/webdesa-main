<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    protected $fillable = [
        'judul',
        'deskripsi',
        'user_id',
    ];

    public function questions()
    {
        return $this->hasMany(SurveyQuestion::class);
    }
}
