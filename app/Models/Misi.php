<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Misi extends Model
{
    use HasFactory;

    protected $table = 'misi';

    protected $fillable = [
        'visi_misi_id',
        'misi',
    ];

    public function visiMisi()
    {
        return $this->belongsTo(VisiMisi::class);
    }
}
