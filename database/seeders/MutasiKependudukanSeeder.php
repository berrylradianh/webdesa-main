<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MutasiKependudukan;

class MutasiKependudukanSeeder extends Seeder
{
    public function run(): void
    {
        MutasiKependudukan::create([
            'data_kependudukan_id' => 1,
            'lahir' => 60,
            'meninggal' => 30,
            'pindah_keluar' => 20,
            'pindah_masuk' => 25,
            'status' => 'approved',
        ]);

        MutasiKependudukan::create([
            'data_kependudukan_id' => 2,
            'lahir' => 65,
            'meninggal' => 35,
            'pindah_keluar' => 22,
            'pindah_masuk' => 28,
            'status' => 'approved',
        ]);

        MutasiKependudukan::create([
            'data_kependudukan_id' => 3,
            'lahir' => 70,
            'meninggal' => 40,
            'pindah_keluar' => 25,
            'pindah_masuk' => 30,
            'status' => 'approved',
        ]);

        MutasiKependudukan::create([
            'data_kependudukan_id' => 4,
            'lahir' => 75,
            'meninggal' => 38,
            'pindah_keluar' => 27,
            'pindah_masuk' => 32,
            'status' => 'approved',
        ]);

        MutasiKependudukan::create([
            'data_kependudukan_id' => 5,
            'lahir' => 80,
            'meninggal' => 42,
            'pindah_keluar' => 29,
            'pindah_masuk' => 35,
            'status' => 'approved',
        ]);

        MutasiKependudukan::create([
            'data_kependudukan_id' => 6,
            'lahir' => 85,
            'meninggal' => 45,
            'pindah_keluar' => 30,
            'pindah_masuk' => 40,
            'status' => 'pending',
        ]);
    }
}
