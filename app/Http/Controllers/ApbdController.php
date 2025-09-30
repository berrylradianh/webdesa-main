<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Apbd;
use App\Models\BudgetType;
use App\Models\DetailBudgetType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ApbdController extends Controller
{
    public function index(Request $request)
    {
        $year = $request->get('year', date('Y'));
        $budgetTypes = BudgetType::orderBy('id')->get();

        $apbds = Apbd::with(['detailBudgetType.groupBudgetType', 'budgetType'])
            ->where('year', $year)
            ->get();

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

        return view('backend.perangkatdesa.apbd.index', compact('reportData', 'budgetTypes', 'year', 'pendapatanType', 'belanjaType', 'pembiayaanType'));
    }

    public function create()
    {
        $years = range(date('Y') - 5, date('Y') + 1);
        $budgetTypes = BudgetType::orderBy('name')->get();
        return view('backend.perangkatdesa.apbd.create', compact('years', 'budgetTypes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'year' => 'required|integer|min:2000|max:' . (date('Y') + 1),
            'budget_type_id' => 'required|exists:budget_types,id',
            'detail_budget_type_id' => 'required|exists:detail_budget_types,id',
            'budget_value' => 'required|numeric|min:0',
            'realization_value' => 'required|numeric|min:0',
            'description' => 'nullable|string|max:1000',
            'evidence_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only([
            'year',
            'budget_type_id',
            'detail_budget_type_id',
            'budget_value',
            'realization_value',
            'description',
        ]);

        $images = [];
        if ($request->hasFile('evidence_images')) {
            foreach ($request->file('evidence_images') as $image) {
                $path = $image->store('apbd_evidence', 'public');
                $images[] = $path;
            }
        }
        $data['evidence_images'] = $images;

        Apbd::create($data);

        return redirect()->route('apbds.index')->with('success', 'Data APBD berhasil disimpan.');
    }

    public function getDetailBudgetTypes($budgetTypeId)
    {
        $details = DetailBudgetType::where('budget_type_id', $budgetTypeId)
            ->orderBy('name')
            ->get(['id', 'name']);
        return response()->json($details);
    }

    public function edit(Apbd $apbd)
    {
        $years = range(date('Y') - 5, date('Y') + 1);
        $budgetTypes = BudgetType::orderBy('name')->get();
        // Load detail jenis anggaran sesuai budget_type_id dari $apbd
        $detailBudgetTypes = DetailBudgetType::where('budget_type_id', $apbd->budget_type_id)->get();
        return view('backend.perangkatdesa.apbd.edit', compact('apbd', 'years', 'budgetTypes', 'detailBudgetTypes'));
    }

    public function update(Request $request, Apbd $apbd)
    {
        $request->validate([
            'year' => 'required|integer|min:2000|max:' . (date('Y') + 1),
            'budget_type_id' => 'required|exists:budget_types,id',
            'detail_budget_type_id' => 'required|exists:detail_budget_types,id',
            'budget_value' => 'required|numeric|min:0',
            'realization_value' => 'required|numeric|min:0',
            'description' => 'nullable|string|max:1000',
            'evidence_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $data = $request->only([
            'year',
            'budget_type_id',
            'detail_budget_type_id',
            'budget_value',
            'realization_value',
            'description',
        ]);

        // Handle upload gambar baru jika ada
        $images = $apbd->evidence_images ?? [];
        if ($request->hasFile('evidence_images')) {
            foreach ($request->file('evidence_images') as $image) {
                $path = $image->store('apbd_evidence', 'public');
                $images[] = $path;
            }
        }
        $data['evidence_images'] = $images;
        $apbd->update($data);
        return redirect()->route('apbds.index')->with('success', 'Data APBD berhasil diperbarui.');
    }


    public function destroy(Apbd $apbd)
    {
        // Hapus file bukti pelaksanaan jika perlu
        if (!empty($apbd->evidence_images)) {
            foreach ($apbd->evidence_images as $image) {
                Storage::disk('public')->delete($image);
            }
        }
        $apbd->delete();
        return redirect()->route('apbds.index')->with('success', 'Data APBD berhasil dihapus.');
    }
}
