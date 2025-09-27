<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'isi',
        'tanggal',
        'category_id',
        'status',
        'lampiran',
        'link',
        'user_id'
    ];

    // Relasi ke kategori
    public function category()
    {
        return $this->belongsTo(AnnouncementCategory::class, 'category_id');
    }

    // Relasi ke user (perangkat desa)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
