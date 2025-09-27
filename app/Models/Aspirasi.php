<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aspirasi extends Model
{
    use HasFactory;

    protected $table = 'aspirasi';

    protected $fillable = [
        'nama_lengkap',
        'nik',
        'no_telpon',
        'kategori',
        'judul',
        'isi',
        'warga_id',
        'pd_id',
        'admin_id',
        'draft_tanggapan',
        'tanggapan_final',
        'status',
    ];

    // Relasi ke warga
    public function warga()
    {
        return $this->belongsTo(User::class, 'warga_id');
    }

    // Relasi ke semua tanggapan (draft + final)
    public function tanggapan()
    {
        return $this->hasMany(AspirasiTanggapan::class, 'aspirasi_id');
    }
}
