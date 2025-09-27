<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataKependudukan extends Model
{
    use HasFactory;

    protected $table = 'data_kependudukan';

    protected $fillable = [
        'user_id',
        'tahun',
        'jumlah_penduduk',
        'jumlah_kk',
        'jumlah_laki',
        'jumlah_perempuan',
        'status',
        'catatan_admin',
    ];

    /**
     * Relasi ke user (perangkat desa yang input).
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi ke mutasi kependudukan.
     */
    public function mutasi()
    {
        return $this->hasMany(MutasiKependudukan::class, 'data_kependudukan_id');
    }
}
