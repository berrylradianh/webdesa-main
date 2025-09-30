<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailBudgetType extends Model
{
    use HasFactory;

    protected $fillable = ['budget_type_id', 'group_budget_type_id', 'icon', 'name'];

    public function budgetType()
    {
        return $this->belongsTo(BudgetType::class);
    }

    public function groupBudgetType()
    {
        return $this->belongsTo(GroupBudgetType::class);
    }
}
