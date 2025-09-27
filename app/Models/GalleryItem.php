<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryItem extends Model
{
    use HasFactory;

    protected $fillable = ['gallery_id', 'file', 'type'];

    public function gallery()
    {
        return $this->belongsTo(Gallery::class);
    }
}
