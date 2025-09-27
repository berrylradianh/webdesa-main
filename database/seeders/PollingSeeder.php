<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Polling;
use Illuminate\Support\Facades\DB;

class PollingSeeder extends Seeder
{
    public function run(): void
    {
        // Contoh polling dummy
        $pollings = [
            [
                'title' => 'Apa warna favorit Anda?',
                'user_id' => 1, // admin id
            ],
            [
                'title' => 'Apakah Anda puas dengan layanan desa?',
                'user_id' => 1,
            ],
        ];

        foreach ($pollings as $poll) {
            Polling::create($poll);
        }
    }
}
