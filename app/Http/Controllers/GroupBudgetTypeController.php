<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\GroupBudgetType;
use Illuminate\Http\Request;

class GroupBudgetTypeController extends Controller
{
    public function index()
    {
        $groupBudgetTypes = GroupBudgetType::orderBy('name')->get();
        return view('backend.perangkatdesa.apbd.kelompokjenisanggaran.index', compact('groupBudgetTypes'));
    }

    public function create()
    {
        return view('backend.perangkatdesa.apbd.kelompokjenisanggaran.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:group_budget_types,name',
            'icon' => 'nullable|string|max:255',
        ]);

        GroupBudgetType::create($request->only('name', 'icon'));

        return redirect()->route('group_budget_types.index')->with('success', 'Kelompok Jenis Anggaran berhasil ditambahkan.');
    }

    public function edit(GroupBudgetType $groupBudgetType)
    {
        return view('backend.perangkatdesa.apbd.kelompokjenisanggaran.edit', compact('groupBudgetType'));
    }

    public function update(Request $request, GroupBudgetType $groupBudgetType)
    {
        $request->validate([
            'name' => 'required|string|unique:group_budget_types,name,' . $groupBudgetType->id,
            'icon' => 'nullable|string|max:255',
        ]);

        $groupBudgetType->update($request->only('name', 'icon'));

        return redirect()->route('group_budget_types.index')->with('success', 'Kelompok Jenis Anggaran berhasil diperbarui.');
    }

    public function destroy(GroupBudgetType $groupBudgetType)
    {
        $groupBudgetType->delete();

        return redirect()->route('group_budget_types.index')->with('success', 'Kelompok Jenis Anggaran berhasil dihapus.');
    }
}
