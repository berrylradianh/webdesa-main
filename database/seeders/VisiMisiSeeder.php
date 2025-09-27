<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\VisiMisi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VisiMisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Pastikan ada user di tabel users, atau buat dummy user
        $user = User::firstOrCreate(
            ['email' => 'test@example.com'],
            [
                'username' => 'Test User',
                'password' => bcrypt('password'),
            ]
        );

        $visiMisiData = [
            [
                'user_id' => $user->id,
                'visi' => 'Menjadi organisasi terdepan dalam inovasi teknologi di Indonesia.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => $user->id,
                'visi' => 'Menciptakan ekosistem pendidikan yang inklusif dan berkualitas.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        // Insert data ke tabel visi_misi
        foreach ($visiMisiData as $data) {
            VisiMisi::create($data);
        }
    }
}
