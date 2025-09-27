<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Agenda;

class AgendaSeeder extends Seeder
{
    public function run(): void
    {
        $agendas = [
            [
                'user_id' => 2,
                'judul' => 'Musyawarah Desa',
                'deskripsi' => 'Rapat koordinasi seluruh perangkat desa dan warga.',
                'tanggal_mulai' => '2025-10-01',
                'tanggal_selesai' => '2025-10-01',
                'lokasi' => 'Balai Desa',
                'status' => 'published',
            ],
            [
                'user_id' => 2,
                'judul' => 'Pelatihan Kewirausahaan',
                'deskripsi' => 'Pelatihan bagi pemuda desa tentang bisnis lokal.',
                'tanggal_mulai' => '2025-10-05',
                'tanggal_selesai' => '2025-10-07',
                'lokasi' => 'Gedung Serbaguna',
                'status' => 'draft',
            ],
            [
                'user_id' => 2,
                'judul' => 'Festival Budaya Desa',
                'deskripsi' => 'Acara tahunan menampilkan kesenian lokal dan kuliner.',
                'tanggal_mulai' => '2025-11-10',
                'tanggal_selesai' => '2025-11-12',
                'lokasi' => 'Lapangan Desa',
                'status' => 'published',
            ],
        ];

        foreach ($agendas as $agenda) {
            Agenda::create($agenda);
        }
    }
}
