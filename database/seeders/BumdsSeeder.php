<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Bumd;

class BumdsSeeder extends Seeder
{
    public function run()
    {
        $bumdsData = [
            [
                'name' => 'BUMDes Makmur Jaya',
                'type' => 'Perdagangan',
                'address' => 'Jl. Raya Desa No. 10, Desa Sukamaju',
                'contact' => '081234567890',
                'establishment_date' => '2020-01-15',
                'description' => 'BUMDes yang bergerak di bidang perdagangan hasil pertanian dan produk lokal.',
                'capital' => 500000000.00,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'BUMDes Sejahtera',
                'type' => 'Jasa',
                'address' => 'Jl. Mawar No. 5, Desa Sentosa',
                'contact' => '082345678901',
                'establishment_date' => '2019-06-20',
                'description' => 'Menyediakan jasa pengelolaan air bersih dan pariwisata desa.',
                'capital' => 750000000.00,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'BUMDes Harapan Baru',
                'type' => 'Pertanian',
                'address' => null,
                'contact' => null,
                'establishment_date' => null,
                'description' => 'Fokus pada pengembangan sektor pertanian organik.',
                'capital' => 300000000.00,
                'status' => 'inactive',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        // Insert data ke tabel bumds
        foreach ($bumdsData as $data) {
            Bumd::create($data);
        }
    }
}
