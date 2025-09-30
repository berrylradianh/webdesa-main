<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\DetailBudgetType;
use App\Models\BudgetType;
use App\Models\GroupBudgetType;
use Illuminate\Http\Request;

class DetailBudgetTypeController extends Controller
{
    public function index()
    {
        $details = DetailBudgetType::with(['budgetType', 'groupBudgetType'])->orderBy('name')->get();
        return view('backend.perangkatdesa.apbd.detailjenisanggran.index', compact('details'));
    }

    public function create()
    {
        $budgetTypes = BudgetType::orderBy('name')->get();
        $groupBudgetTypes = GroupBudgetType::orderBy('name')->get();
        return view('backend.perangkatdesa.apbd.detailjenisanggran.create', compact('budgetTypes', 'groupBudgetTypes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'budget_type_id' => 'required|exists:budget_types,id',
            'group_budget_type_id' => 'required|exists:group_budget_types,id',
            'name' => 'required|string|unique:detail_budget_types,name',
            'icon' => 'nullable|string|max:255',
        ]);

        DetailBudgetType::create($request->only('budget_type_id', 'group_budget_type_id', 'icon', 'name'));

        return redirect()->route('detail_budget_types.index')->with('success', 'Detail Jenis Anggaran berhasil ditambahkan.');
    }

    public function edit(DetailBudgetType $detailBudgetType)
    {
        $budgetTypes = BudgetType::orderBy('name')->get();
        $groupBudgetTypes = GroupBudgetType::orderBy('name')->get();
        return view('backend.perangkatdesa.apbd.detailjenisanggran.edit', compact('detailBudgetType', 'budgetTypes', 'groupBudgetTypes'));
    }

    public function update(Request $request, DetailBudgetType $detailBudgetType)
    {
        $request->validate([
            'budget_type_id' => 'required|exists:budget_types,id',
            'group_budget_type_id' => 'required|exists:group_budget_types,id',
            'name' => 'required|string|unique:detail_budget_types,name,' . $detailBudgetType->id,
            'icon' => 'nullable|string|max:255',
        ]);

        $detailBudgetType->update($request->only('budget_type_id', 'group_budget_type_id', 'icon', 'name'));

        return redirect()->route('detail_budget_types.index')->with('success', 'Detail Jenis Anggaran berhasil diperbarui.');
    }

    public function destroy(DetailBudgetType $detailBudgetType)
    {
        $detailBudgetType->delete();

        return redirect()->route('detail_budget_types.index')->with('success', 'Detail Jenis Anggaran berhasil dihapus.');
    }
}
