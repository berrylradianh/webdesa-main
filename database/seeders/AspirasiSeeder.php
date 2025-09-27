<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Aspirasi;

class AspirasiSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'judul' => 'Aspirasi warga #1',
                'isi' => 'Perbaikan jalan lingkungan RT 02',
                'warga_id' => 3, // contoh id warga
                'pd_id' => 2, // contoh id perangkat desa
                'admin_id' => 1, // contoh id admin
                'draft_tanggapan' => 'Sudah masuk rencana anggaran desa, menunggu validasi',
                'tanggapan_final' => 'Disetujui, akan direalisasikan tahun ini',
                'status' => 'Menunggu',
                'nama_lengkap' => 'Muhammad',
                'nik' => '1234567890',
                'no_telpon' => '08123456789',
                'kategori' => 'Kesehatan',
            ],
            [
                'judul' => 'Aspirasi warga #2',
                'isi' => 'MBG Sekolah',
                'warga_id' => 3, // contoh id warga
                'pd_id' => 2, // contoh id perangkat desa
                'admin_id' => 1, // contoh id admin
                'draft_tanggapan' => '',
                'tanggapan_final' => '',
                'status' => 'Menunggu',
                'nama_lengkap' => 'Muhammad',
                'nik' => '1234567890',
                'no_telpon' => '08123456789',
                'kategori' => 'Kesehatan',
            ],
        ];

        foreach ($data as $aspirasi) {
            Aspirasi::create($aspirasi);
        }
    }
}
