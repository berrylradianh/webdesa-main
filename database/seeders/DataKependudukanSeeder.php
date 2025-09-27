<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DataKependudukan;

class DataKependudukanSeeder extends Seeder
{
    public function run(): void
    {
        DataKependudukan::create([
            'user_id' => 2,
            'tahun' => 2020,
            'jumlah_penduduk' => 2500,
            'jumlah_kk' => 700,
            'jumlah_laki' => 1200,
            'jumlah_perempuan' => 1300,
            'status' => 'approved',
        ]);

        DataKependudukan::create([
            'user_id' => 2,
            'tahun' => 2021,
            'jumlah_penduduk' => 2550,
            'jumlah_kk' => 720,
            'jumlah_laki' => 1225,
            'jumlah_perempuan' => 1325,
            'status' => 'approved',
        ]);

        DataKependudukan::create([
            'user_id' => 2,
            'tahun' => 2022,
            'jumlah_penduduk' => 2600,
            'jumlah_kk' => 740,
            'jumlah_laki' => 1250,
            'jumlah_perempuan' => 1350,
            'status' => 'approved',
        ]);

        DataKependudukan::create([
            'user_id' => 2,
            'tahun' => 2023,
            'jumlah_penduduk' => 2650,
            'jumlah_kk' => 760,
            'jumlah_laki' => 1275,
            'jumlah_perempuan' => 1375,
            'status' => 'approved',
        ]);

        DataKependudukan::create([
            'user_id' => 2,
            'tahun' => 2024,
            'jumlah_penduduk' => 2700,
            'jumlah_kk' => 780,
            'jumlah_laki' => 1300,
            'jumlah_perempuan' => 1400,
            'status' => 'approved',
        ]);

        DataKependudukan::create([
            'user_id' => 2,
            'tahun' => 2025,
            'jumlah_penduduk' => 2750,
            'jumlah_kk' => 800,
            'jumlah_laki' => 1325,
            'jumlah_perempuan' => 1425,
            'status' => 'pending',
        ]);
    }
}
