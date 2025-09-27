<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\OperationalHour;

class OperationalHourSeeder extends Seeder
{
    public function run(): void
    {
        OperationalHour::create([
            'user_id' => 2,
            'day' => 'Senin',
            'open_time' => '08:00',
            'close_time' => '16:00',
            'is_closed' => false,
        ]);

        OperationalHour::create([
            'user_id' => 2,
            'day' => 'Selasa',
            'open_time' => '08:00',
            'close_time' => '16:00',
            'is_closed' => false,
        ]);

        OperationalHour::create([
            'user_id' => 2,
            'day' => 'Rabu',
            'open_time' => '08:00',
            'close_time' => '16:00',
            'is_closed' => false,
        ]);

        OperationalHour::create([
            'user_id' => 2,
            'day' => 'Kamis',
            'open_time' => '08:00',
            'close_time' => '16:00',
            'is_closed' => false,
        ]);

        OperationalHour::create([
            'user_id' => 2,
            'day' => 'Jumat',
            'open_time' => '08:00',
            'close_time' => '16:00',
            'is_closed' => false,
        ]);

        OperationalHour::create([
            'user_id' => 2,
            'day' => 'Sabtu',
            'open_time' => null,
            'close_time' => null,
            'is_closed' => true,
        ]);

        OperationalHour::create([
            'user_id' => 2,
            'day' => 'Minggu',
            'open_time' => null,
            'close_time' => null,
            'is_closed' => true,
        ]);
    }
}
