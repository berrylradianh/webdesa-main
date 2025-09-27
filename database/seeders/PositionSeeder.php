<?php

namespace Database\Seeders;

use App\Models\Position;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $positionsData = [
            [
                'name' => 'Kepala Desa',
                'type' => 'pemerintah',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sekretaris Desa',
                'type' => 'pemerintah',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ketua BPD',
                'type' => 'bpd',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Anggota BPD',
                'type' => 'bpd',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ketua Lembaga Adat',
                'type' => 'lembaga',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        // Insert data ke tabel positions
        foreach ($positionsData as $data) {
            Position::create($data);
        }
    }
}
