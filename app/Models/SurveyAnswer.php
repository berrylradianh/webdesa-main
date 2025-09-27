<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class SurveyAnswer extends Model
{
    protected $fillable = [
        'question_id',
        'option_id',
        'warga_id',
        'nilai',
    ];

    public function question()
    {
        return $this->belongsTo(SurveyQuestion::class);
    }

    public function option()
    {
        return $this->belongsTo(SurveyOption::class);
    }
}