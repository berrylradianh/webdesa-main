<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Position extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'parent_id',
        'type',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function children(): HasMany
    {
        return $this->hasMany(Position::class, 'parent_id');
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Position::class, 'parent_id');
    }

    public function members(): HasMany
    {
        return $this->hasMany(Member::class);
    }

    public function profiles(): HasMany
    {
        return $this->hasMany(VillageOfficialProfile::class, 'position_id');
    }
}
