<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Survey;
use App\Models\SurveyQuestion;
use App\Models\SurveyOption;
use App\Models\SurveyAnswer;

class SurveySeeder extends Seeder
{
    public function run(): void
    {
        // buat survei contoh
        $survey = Survey::create([
            'judul' => 'Survei Kepuasan Pelayanan Desa',
            'deskripsi' => 'Mohon isi survei ini untuk meningkatkan kualitas layanan desa.',
            'user_id' => 1, // admin yg buat
        ]);

        // pertanyaan 1 - pilihan ganda
        $q1 = SurveyQuestion::create([
            'survey_id' => $survey->id,
            'pertanyaan' => 'Bagaimana pendapat Anda tentang pelayanan administrasi?',
            'tipe' => 'pilihan',
        ]);

        $opsi1 = SurveyOption::insert([
            ['question_id' => $q1->id, 'opsi' => 'Sangat Baik'],
            ['question_id' => $q1->id, 'opsi' => 'Baik'],
            ['question_id' => $q1->id, 'opsi' => 'Cukup'],
            ['question_id' => $q1->id, 'opsi' => 'Kurang'],
        ]);

        // pertanyaan 2 - skala (likert 1-5)
        $q2 = SurveyQuestion::create([
            'survey_id' => $survey->id,
            'pertanyaan' => 'Seberapa puas Anda dengan respon perangkat desa?',
            'tipe' => 'skala',
        ]);

        // contoh jawaban warga
        SurveyAnswer::create([
            'question_id' => $q1->id,
            'option_id' => 1, // pilih "Sangat Baik"
            'warga_id' => 2,  // user warga id 2
        ]);

        SurveyAnswer::create([
            'question_id' => $q2->id,
            'nilai' => 4, // skala 1-5
            'warga_id' => 2,
        ]);
    }
}
