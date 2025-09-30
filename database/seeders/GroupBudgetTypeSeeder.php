<?php

namespace Database\Seeders;

use App\Models\GroupBudgetType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GroupBudgetTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $groupBudgetTypes = [
            [
                'name' => 'Pendapatan Asli Desa',
                'icon' => '<i data-feather="dollar-sign" class="mr-2 w-5 h-5"></i>',
            ],
            [
                'name' => 'Pendapatan transfer',
                'icon' => '<i data-feather="arrow-down-circle" class="mr-2 w-5 h-5"></i>',
            ],
            [
                'name' => 'Pendapatan Lain-lain',
                'icon' => '<i data-feather="plus-circle" class="mr-2 w-5 h-5"></i>',
            ],
            [
                'name' => 'BIDANG PENYELENGGARAN PEMERINTAHAN DESA',
                'icon' => '<i data-feather="home" class="mr-2 w-5 h-5"></i>',
            ],
            [
                'name' => 'BIDANG PELAKSANAAN PEMBANGUNAN DESA',
                'icon' => '<i data-feather="tool" class="mr-2 w-5 h-5"></i>',
            ],
            [
                'name' => 'BIDANG PEMBINAAN KEMASYARAKATAN',
                'icon' => '<i data-feather="users" class="mr-2 w-5 h-5"></i>',
            ],
            [
                'name' => 'BIDANG PEMBERDAYAAN MASYARAKAT',
                'icon' => '<i data-feather="trending-up" class="mr-2 w-5 h-5"></i>',
            ],
            [
                'name' => 'BIDANG PENANGGULANGAN BENCANA, DARURAT DAN MENDESAK DESA',
                'icon' => '<i data-feather="alert-triangle" class="mr-2 w-5 h-5"></i>',
            ],
            [
                'name' => 'Penerimaan Biaya',
                'icon' => '<i data-feather="download" class="mr-2 w-5 h-5"></i>',
            ],
            [
                'name' => 'Pengeluaran Biaya',
                'icon' => '<i data-feather="upload" class="mr-2 w-5 h-5"></i>',
            ],
        ];

        foreach ($groupBudgetTypes as $type) {
            GroupBudgetType::updateOrCreate(
                ['name' => $type['name']],
                ['icon' => $type['icon']]
            );
        }
    }
}
