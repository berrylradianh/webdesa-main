<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PollingAnswer;
use App\Models\Polling;

class PollingAnswerSeeder extends Seeder
{
    public function run(): void
    {
        $userId = 3;

        $polling1 = Polling::with('options')->find(1);
        if ($polling1 && $polling1->options->isNotEmpty()) {
            PollingAnswer::create([
                'polling_id' => $polling1->id,
                'option_id' => $polling1->options->first()->id,
                'user_id' => $userId,
                'name' => 'muhammad',
                'nik' => '1234567890',
            ]);
        }

        $polling2 = Polling::with('options')->find(2);
        if ($polling2 && $polling2->options->isNotEmpty()) {
            PollingAnswer::create([
                'polling_id' => $polling2->id,
                'option_id' => $polling2->options->last()->id,
                'user_id' => $userId,
                'name' => 'muhammad',
                'nik' => '1234567890',
            ]);
        }
    }
}
