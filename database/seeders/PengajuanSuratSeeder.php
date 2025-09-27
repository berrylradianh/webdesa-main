<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PengajuanSurat;

class PengajuanSuratSeeder extends Seeder
{
    public function run(): void
    {
        PengajuanSurat::create([
            'user_id' => 3,
            'template_id' => 1,
            'status' => 'pending',
            'keperluan' => 'Sebagai identitas awal bagi pendatang baru didesa',
            'nik' => '1234567890',
            'nama_lengkap' => 'Muhammad',
            'alamat' => 'Jl. Kebon Jeruk, Kec. Sungai Buloh, Kab. Kota, Kota',
            'no_telepon' => '08123456789',
        ]);
    }
}
