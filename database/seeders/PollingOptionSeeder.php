<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Polling;
use App\Models\PollingOption;

class PollingOptionSeeder extends Seeder
{
    public function run(): void
    {
        $pollings = Polling::all();

        foreach ($pollings as $polling) {
            if ($polling->title == 'Apa warna favorit Anda?') {
                $options = ['Merah', 'Biru', 'Hijau', 'Kuning'];
            } elseif ($polling->title == 'Apakah Anda puas dengan layanan desa?') {
                $options = ['Sangat Puas', 'Puas', 'Cukup', 'Tidak Puas'];
            } else {
                $options = [];
            }

            foreach ($options as $option_text) {
                $polling->options()->create([
                    'option_text' => $option_text,
                ]);
            }
        }
    }
}
