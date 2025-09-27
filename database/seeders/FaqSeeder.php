<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Faq;

class FaqSeeder extends Seeder
{
    public function run(): void
    {
        $faqs = [
            [
                'question' => 'Bagaimana cara mengajukan surat?',
                'answer' => 'Warga dapat mengajukan surat melalui menu Pengajuan di dashboard.',
                'user_id' => 1, // admin
            ],
            [
                'question' => 'Berapa lama proses pengajuan?',
                'answer' => 'Proses pengajuan biasanya memakan waktu 1-3 hari kerja.',
                'user_id' => 1,
            ],
            [
                'question' => 'Siapa yang bisa melihat status pengajuan?',
                'answer' => 'Warga yang mengajukan dan perangkat desa dapat melihat status pengajuan.',
                'user_id' => 1,
            ],
        ];

        foreach ($faqs as $faq) {
            Faq::create($faq);
        }
    }
}
