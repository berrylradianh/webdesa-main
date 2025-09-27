<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'judul', 'tanggal', 'jam'];

    protected $dates = ['tanggal'];

    public function items()
    {
        return $this->hasMany(GalleryItem::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
