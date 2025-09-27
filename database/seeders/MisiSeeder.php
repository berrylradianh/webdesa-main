<?php

namespace Database\Seeders;

use App\Models\Misi;
use App\Models\VisiMisi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $visiMisi = VisiMisi::all();

        $misiData = [
            [
                'visi_misi_id' => $visiMisi[0]->id,
                'misi' => 'Mengembangkan solusi teknologi inovatif untuk kebutuhan masyarakat.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'visi_misi_id' => $visiMisi[0]->id,
                'misi' => 'Meningkatkan kolaborasi dengan komunitas teknologi global.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'visi_misi_id' => $visiMisi[1]->id,
                'misi' => 'Menyediakan akses pendidikan berkualitas untuk semua kalangan.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'visi_misi_id' => $visiMisi[1]->id,
                'misi' => 'Membangun kurikulum yang relevan dengan kebutuhan industri.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        // Insert data ke tabel misi
        foreach ($misiData as $data) {
            Misi::create($data);
        }
    }
}
