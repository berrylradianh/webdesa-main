<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Gallery;
use App\Models\GalleryItem;

class GallerySeeder extends Seeder
{
    public function run(): void
    {
        $galleries = [
            [
                'user_id' => 2,
                'judul' => 'Kegiatan Gotong Royong',
                'tanggal' => '2025-09-15',
                'jam' => '08:00:00',
                'items' => [
                    ['file' => 'galleries/gotongroyong1.jpg', 'type' => 'foto'],
                    ['file' => 'galleries/gotongroyong2.jpg', 'type' => 'foto'],
                    ['file' => 'galleries/gotongroyong_video.mp4', 'type' => 'video'],
                ],
            ],
            [
                'user_id' => 2,
                'judul' => 'Festival Seni Desa',
                'tanggal' => '2025-09-20',
                'jam' => '10:00:00',
                'items' => [
                    ['file' => 'galleries/festival1.jpg', 'type' => 'foto'],
                    ['file' => 'galleries/festival2.jpg', 'type' => 'foto'],
                ],
            ],
        ];

        foreach ($galleries as $data) {
            $gallery = Gallery::create([
                'user_id' => $data['user_id'],
                'judul' => $data['judul'],
                'tanggal' => $data['tanggal'],
                'jam' => $data['jam'],
            ]);

            foreach ($data['items'] as $item) {
                $gallery->items()->create($item);
            }
        }
    }
}
