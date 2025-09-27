<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bumd extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'address',
        'contact',
        'establishment_date',
        'description',
        'capital',
        'status',
    ];

    protected $casts = [
        'establishment_date' => 'date',
        'capital' => 'decimal:2',
        'status' => 'string',
    ];
}
