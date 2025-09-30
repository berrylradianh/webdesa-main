<?php

namespace App\Http\Controllers\landing;

use App\Http\Controllers\Controller;
use App\Models\Apbd;
use App\Models\BudgetType;
use App\Models\OperationalHour;
use Illuminate\Http\Request;

class ApbdLandingController extends Controller
{
    public function index(Request $request)
    {
        $year = $request->get('year', date('Y'));
        $operationalHours = OperationalHour::orderByRaw("FIELD(day, 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu')")
            ->get();
        // Ambil jenis anggaran
        $budgetTypes = BudgetType::orderBy('id')->get();
        // Ambil data APBD tahun tertentu dengan relasi
        $apbds = Apbd::with(['detailBudgetType.groupBudgetType', 'budgetType'])
            ->where('year', $year)
            ->get();
        // Struktur data laporan gabungan
        $reportData = [];

        foreach ($budgetTypes as $budgetType) {
            $reportData[$budgetType->id] = [
                'budget_type' => $budgetType,
                'groups' => [],
                'total_budget' => 0,
                'total_realization' => 0,
            ];
        }

        foreach ($apbds as $apbd) {
            $btId = $apbd->budget_type_id;
            $group = $apbd->detailBudgetType->groupBudgetType;
            $groupId = $group->id;
            $detail = $apbd->detailBudgetType;
            if (!isset($reportData[$btId]['groups'][$groupId])) {
                $reportData[$btId]['groups'][$groupId] = [
                    'group' => $group,
                    'details' => [],
                    'total_budget' => 0,
                    'total_realization' => 0,
                ];
            }
            $reportData[$btId]['groups'][$groupId]['details'][] = $apbd;
            $reportData[$btId]['groups'][$groupId]['total_budget'] += $apbd->budget_value;
            $reportData[$btId]['groups'][$groupId]['total_realization'] += $apbd->realization_value;
            $reportData[$btId]['total_budget'] += $apbd->budget_value;
            $reportData[$btId]['total_realization'] += $apbd->realization_value;
        }

        $pendapatanType = $budgetTypes->firstWhere('name', 'Pendapatan');
        $belanjaType = $budgetTypes->firstWhere('name', 'Belanja');
        $pembiayaanType = $budgetTypes->firstWhere('name', 'Pembiayaan');
        return view('landing.pages.apbd.index', compact(
            'operationalHours',
            'reportData',
            'budgetTypes',
            'year',
            'pendapatanType',
            'belanjaType',
            'pembiayaanType'
        ));
    }
}
