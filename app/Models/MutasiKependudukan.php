<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MutasiKependudukan extends Model
{
    use HasFactory;

    protected $table = 'mutasi_kependudukan';

    protected $fillable = [
        'data_kependudukan_id',
        'lahir',
        'meninggal',
        'pindah_keluar',
        'pindah_masuk',
        'status',
        'catatan_admin',
    ];

    /**
     * Relasi ke data kependudukan (induk).
     */
    public function dataKependudukan()
    {
        return $this->belongsTo(DataKependudukan::class, 'data_kependudukan_id');
    }
}
