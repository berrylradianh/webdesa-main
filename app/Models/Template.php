<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    use HasFactory;

    protected $table = 'templates';

    protected $fillable = [
        'name',
        'file_path',
        'description',
        'created_by',
    ];

    /**
     * Relasi: Template dibuat oleh user (Admin/PD)
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * Relasi: Template dipakai di banyak pengajuan
     */
    public function pengajuanSurat()
    {
        return $this->hasMany(PengajuanSurat::class, 'template_id');
    }
}
