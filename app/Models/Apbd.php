<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apbd extends Model
{
    use HasFactory;

    protected $fillable = [
        'year',
        'budget_type_id',
        'detail_budget_type_id',
        'budget_value',
        'realization_value',
        'description',
        'evidence_images',
    ];

    protected $casts = [
        'evidence_images' => 'array',
        'year' => 'integer',
        'budget_value' => 'decimal:2',
        'realization_value' => 'decimal:2',
    ];

    public function budgetType()
    {
        return $this->belongsTo(BudgetType::class);
    }

    public function detailBudgetType()
    {
        return $this->belongsTo(DetailBudgetType::class);
    }
}
