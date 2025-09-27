<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\VillageOfficialProfile;
use App\Models\User;
use App\Models\Position;

class VillageOfficialProfilesSeeder extends Seeder
{
    public function run()
    {
        $positions = Position::whereIn('name', ['Kepala Desa', 'Sekretaris Desa', 'Ketua BPD'])->get();

        // Data contoh untuk village_official_profiles
        $profilesData = [
            [
                'user_id' => 1,
                'position_id' => $positions->where('name', 'Kepala Desa')->first()->id,
                'name' => 'Budi Santoso',
                'nik' => '1234567890123456',
                'photo' => 'profiles/ERu3JIklUmw300Yetlg71bWiMn7pe2wNek5UkIDb.jpg',
                'phone' => '081234567890',
                'email' => 'budi.santoso@example.com',
                'address' => 'Jl. Raya Desa No. 1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'position_id' => $positions->where('name', 'Sekretaris Desa')->first()->id,
                'name' => 'Siti Aminah',
                'nik' => '9876543210987654',
                'photo' => 'profiles/fzLFyCL4roX6c4CbWHMrprm9Lp9qAYoTNI0DB4t8.jpg',
                'phone' => '082345678901',
                'email' => 'siti.aminah@example.com',
                'address' => 'Jl. Mawar No. 10',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'position_id' => $positions->where('name', 'Ketua BPD')->first()->id,
                'name' => 'Ahmad Yani',
                'nik' => '1122334455667788',
                'photo' => 'profiles/mbqYmDNZs2RKanmBWrHQqgMfczbRjDl2Ljydf777.jpg',
                'phone' => '083456789012',
                'email' => null,
                'address' => 'Jl. Melati No. 5',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        // Insert data ke tabel village_official_profiles
        foreach ($profilesData as $data) {
            VillageOfficialProfile::create($data);
        }
    }
}
