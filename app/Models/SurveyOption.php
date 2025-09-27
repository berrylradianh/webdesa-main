<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class SurveyOption extends Model
{
    protected $fillable = ['question_id', 'opsi'];

    public function question()
    {
        return $this->belongsTo(SurveyQuestion::class);
    }

    public function answers()
    {
        return $this->hasMany(SurveyAnswer::class, 'option_id');
    }
}