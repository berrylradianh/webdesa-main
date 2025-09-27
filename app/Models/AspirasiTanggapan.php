<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AspirasiTanggapan extends Model
{
    protected $table = 'aspirasi_tanggapan';
    protected $fillable = [
        'aspirasi_id',
        'user_id',
        'isi',
        'tipe',
    ];

    public function aspirasi()
    {
        return $this->belongsTo(Aspirasi::class, 'aspirasi_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
