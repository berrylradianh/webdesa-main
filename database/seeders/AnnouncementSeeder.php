<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Announcement;

class AnnouncementSeeder extends Seeder
{
    public function run(): void
    {
        // Contoh user_id perangkat desa
        $userId = 2;

        Announcement::create([
            'judul' => 'Gotong Royong Desa',
            'isi' => 'Diharapkan seluruh warga hadir pada acara gotong royong desa pada hari Minggu pukul 07:00 WIB di Balai Desa.',
            'tanggal' => '2025-09-22',
            'user_id' => $userId,
            'category_id' => 2, // Kegiatan Desa
            'status' => 'published',
            'lampiran' => null,
            'link' => null,
        ]);

        Announcement::create([
            'judul' => 'Pelayanan KTP Sementara Ditutup',
            'isi' => 'Pelayanan pembuatan dan perpanjangan KTP di kantor desa akan ditutup sementara mulai 25 September 2025 untuk pemeliharaan sistem.',
            'tanggal' => '2025-09-25',
            'user_id' => $userId,
            'category_id' => 4, // Pengumuman Layanan
            'status' => 'published',
            'lampiran' => null,
            'link' => null,
        ]);

        Announcement::create([
            'judul' => 'Posyandu Balita',
            'isi' => 'Kegiatan Posyandu Balita akan dilaksanakan pada 1 Oktober 2025 di Pos Kesehatan Desa mulai pukul 08:00 WIB.',
            'tanggal' => '2025-10-01',
            'user_id' => $userId,
            'category_id' => 2, // Kegiatan Desa
            'status' => 'published',
            'lampiran' => null,
            'link' => null,
        ]);
    }
}
