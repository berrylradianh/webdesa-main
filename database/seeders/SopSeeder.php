<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sop;

class SopSeeder extends Seeder
{
    public function run(): void
    {
        $sops = [
            [
                'title' => 'Prosedur Pengajuan Surat Keterangan',
                'step_number' => 1,
                'description' => 'Warga datang ke kantor desa dan mengisi formulir pengajuan.',
                'user_id' => 1,
            ],
            [
                'title' => 'Prosedur Pengajuan Surat Keterangan',
                'step_number' => 2,
                'description' => 'Petugas memeriksa dokumen yang diajukan warga.',
                'user_id' => 1,
            ],
            [
                'title' => 'Prosedur Pengajuan Surat Keterangan',
                'step_number' => 3,
                'description' => 'Petugas memproses surat dan menandatangani dokumen.',
                'user_id' => 1,
            ],
            [
                'title' => 'Prosedur Pengajuan Surat Keterangan',
                'step_number' => 4,
                'description' => 'Warga mengambil surat yang sudah selesai diproses.',
                'user_id' => 1,
            ],
        ];

        foreach ($sops as $sop) {
            Sop::create($sop);
        }
    }
}
