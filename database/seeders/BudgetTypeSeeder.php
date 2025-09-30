<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BudgetType;

class BudgetTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $budgetTypes = [
            [
                'name' => 'Pendapatan',
                'icon' => '<i data-feather="trending-up" class="mr-2 w-5 h-5"></i>',
            ],
            [
                'name' => 'Pembiayaan',
                'icon' => '<i data-feather="briefcase" class="mr-2 w-5 h-5"></i>',
            ],
            [
                'name' => 'Belanja',
                'icon' => '<i data-feather="shopping-cart" class="mr-2 w-5 h-5"></i>',
            ],
        ];

        foreach ($budgetTypes as $type) {
            BudgetType::updateOrCreate(
                ['name' => $type['name']],
                ['icon' => $type['icon']]
            );
        }
    }
}
