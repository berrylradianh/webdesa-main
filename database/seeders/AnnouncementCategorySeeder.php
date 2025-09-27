<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AnnouncementCategory;

class AnnouncementCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Informasi Umum',
            'Kegiatan Desa',
            'Peringatan',
            'Pengumuman Layanan',
        ];

        foreach ($categories as $cat) {
            AnnouncementCategory::create(['name' => $cat]);
        }
    }
}
