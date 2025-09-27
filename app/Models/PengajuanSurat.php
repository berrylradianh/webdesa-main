<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanSurat extends Model
{
    use HasFactory;

    protected $table = 'pengajuan_surat';

    protected $fillable = [
        'template_id',
        'user_id',
        'nik',
        'nama_lengkap',
        'alamat',
        'no_telepon',
        'status',
        'keperluan',
        'override_status',
        'processed_by',
    ];

    /**
     * Relasi: Pengajuan dibuat oleh user (warga)
     */
    public function warga()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Relasi: Pengajuan memakai template surat
     */
    public function template()
    {
        return $this->belongsTo(Template::class, 'template_id');
    }

    /**
     * Relasi: Pengajuan diproses oleh PD (atau Admin)
     */
    public function processor()
    {
        return $this->belongsTo(User::class, 'processed_by');
    }
}
