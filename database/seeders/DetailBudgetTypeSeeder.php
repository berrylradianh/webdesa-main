<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DetailBudgetType;
use App\Models\BudgetType;
use App\Models\GroupBudgetType;

class DetailBudgetTypeSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['budget_type' => 'PEMBIAYAAN', 'group_budget_type' => 'Penerimaan Biaya', 'name' => 'SILPA Tahun Sebelumnya', 'icon' => '<i data-feather="archive" class="mr-2 w-5 h-5"></i>'],
            ['budget_type' => 'PEMBIAYAAN', 'group_budget_type' => 'Penerimaan Biaya', 'name' => 'Pencairan Dana Cadangan', 'icon' => '<i data-feather="dollar-sign" class="mr-2 w-5 h-5"></i>'],
            ['budget_type' => 'PEMBIAYAAN', 'group_budget_type' => 'Penerimaan Biaya', 'name' => 'Hasil Penjualan Kekayaan Desa Yang Dipisahkan', 'icon' => '<i data-feather="shopping-cart" class="mr-2 w-5 h-5"></i>'],
            ['budget_type' => 'PEMBIAYAAN', 'group_budget_type' => 'Penerimaan Biaya', 'name' => 'Penerimaan Pembiayaan Lainnya', 'icon' => '<i data-feather="plus-circle" class="mr-2 w-5 h-5"></i>'],
            ['budget_type' => 'PEMBIAYAAN', 'group_budget_type' => 'Pengeluaran Biaya', 'name' => 'Pembentukan Dana Cadangan', 'icon' => '<i data-feather="layers" class="mr-2 w-5 h-5"></i>'],
            ['budget_type' => 'PEMBIAYAAN', 'group_budget_type' => 'Pengeluaran Biaya', 'name' => 'Penyertaan Modal Desa', 'icon' => '<i data-feather="briefcase" class="mr-2 w-5 h-5"></i>'],
            ['budget_type' => 'PEMBIAYAAN', 'group_budget_type' => 'Pengeluaran Biaya', 'name' => 'Pengeluaran Pembiayaan Lainnya', 'icon' => '<i data-feather="minus-circle" class="mr-2 w-5 h-5"></i>'],
            ['budget_type' => 'PENDAPATAN', 'group_budget_type' => 'Pendapatan Asli Desa', 'name' => 'Hasil Usaha Desa', 'icon' => '<i data-feather="trending-up" class="mr-2 w-5 h-5"></i>'],
            ['budget_type' => 'PENDAPATAN', 'group_budget_type' => 'Pendapatan Asli Desa', 'name' => 'Hasil Aset Desa', 'icon' => '<i data-feather="home" class="mr-2 w-5 h-5"></i>'],
            ['budget_type' => 'PENDAPATAN', 'group_budget_type' => 'Pendapatan Asli Desa', 'name' => 'Swadaya, Partisipasi dan Gotong Royong', 'icon' => '<i data-feather="users" class="mr-2 w-5 h-5"></i>'],
            ['budget_type' => 'PENDAPATAN', 'group_budget_type' => 'Pendapatan Asli Desa', 'name' => 'Lain-Lain Pendapatan Asli Desa', 'icon' => '<i data-feather="more-horizontal" class="mr-2 w-5 h-5"></i>'],
            ['budget_type' => 'PENDAPATAN', 'group_budget_type' => 'Pendapatan transfer', 'name' => 'Dana Desa', 'icon' => '<i data-feather="gift" class="mr-2 w-5 h-5"></i>'],
            ['budget_type' => 'PENDAPATAN', 'group_budget_type' => 'Pendapatan transfer', 'name' => 'Bagi Hasil Pajak dan Retribusi', 'icon' => '<i data-feather="pie-chart" class="mr-2 w-5 h-5"></i>'],
            ['budget_type' => 'PENDAPATAN', 'group_budget_type' => 'Pendapatan transfer', 'name' => 'Alokasi Dana Desa', 'icon' => '<i data-feather="layers" class="mr-2 w-5 h-5"></i>'],
            ['budget_type' => 'PENDAPATAN', 'group_budget_type' => 'Pendapatan transfer', 'name' => 'Bantuan Keuangan Provinsi', 'icon' => '<i data-feather="flag" class="mr-2 w-5 h-5"></i>'],
            ['budget_type' => 'PENDAPATAN', 'group_budget_type' => 'Pendapatan transfer', 'name' => 'Bantuan Keuangan Kabupaten/Kota', 'icon' => '<i data-feather="map-pin" class="mr-2 w-5 h-5"></i>'],
            ['budget_type' => 'PENDAPATAN', 'group_budget_type' => 'Pendapatan Lain-lain', 'name' => 'Penerimaan dari Hasil Kerjasama Antar Desa', 'icon' => '<i data-feather="handshake" class="mr-2 w-5 h-5"></i>'],
            ['budget_type' => 'PENDAPATAN', 'group_budget_type' => 'Pendapatan Lain-lain', 'name' => 'Penerimaan dari Hasil Kerjasama dengan Pihak Ketiga', 'icon' => '<i data-feather="users" class="mr-2 w-5 h-5"></i>'],
            ['budget_type' => 'PENDAPATAN', 'group_budget_type' => 'Pendapatan Lain-lain', 'name' => 'Penerimaan Bantuan dari Perusahaan yang Berlokasi di Desa', 'icon' => '<i data-feather="briefcase" class="mr-2 w-5 h-5"></i>'],
            ['budget_type' => 'PENDAPATAN', 'group_budget_type' => 'Pendapatan Lain-lain', 'name' => 'Hibah dan Sumbangan dari Pihak Ketiga', 'icon' => '<i data-feather="gift" class="mr-2 w-5 h-5"></i>'],
            ['budget_type' => 'PENDAPATAN', 'group_budget_type' => 'Pendapatan Lain-lain', 'name' => 'Koreksi Kesalahan Belanja Tahun-tahun Sebelumnya', 'icon' => '<i data-feather="refresh-ccw" class="mr-2 w-5 h-5"></i>'],
            ['budget_type' => 'PENDAPATAN', 'group_budget_type' => 'Pendapatan Lain-lain', 'name' => 'Bunga Bank', 'icon' => '<i data-feather="dollar-sign" class="mr-2 w-5 h-5"></i>'],
            ['budget_type' => 'PENDAPATAN', 'group_budget_type' => 'Pendapatan Lain-lain', 'name' => 'Lain-lain Pendapatan Desa Yang Sah', 'icon' => '<i data-feather="more-vertical" class="mr-2 w-5 h-5"></i>'],
        ];

        foreach ($data as $item) {
            $budgetType = BudgetType::where('name', $item['budget_type'])->first();
            $groupBudgetType = GroupBudgetType::where('name', $item['group_budget_type'])->first();

            if ($budgetType && $groupBudgetType) {
                DetailBudgetType::updateOrCreate(
                    [
                        'budget_type_id' => $budgetType->id,
                        'group_budget_type_id' => $groupBudgetType->id,
                        'name' => $item['name'],
                        'icon' => $item['icon'],
                    ]
                );
            }
        }
    }
}
