<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\VillageProfile;

class VillageProfileSeeder extends Seeder
{
    public function run(): void
    {
        VillageProfile::create([
            'user_id' => 1, // sesuaikan dengan user desa yang ada
            'village_name' => 'Desa Sukamaju',
            'profile' => 'Desa Sukamaju merupakan desa yang terletak di wilayah Kabupaten Musi Banyuasin dengan kondisi masyarakat yang ramah, mayoritas bekerja sebagai petani dan pedagang.',
            'history' => 'Desa Sukamaju berdiri sejak tahun 1950-an, awalnya merupakan dusun kecil yang dihuni oleh beberapa keluarga. Seiring perkembangan zaman, desa ini terus berkembang hingga resmi menjadi desa dengan struktur pemerintahan sendiri.',
        ]);
    }
}
