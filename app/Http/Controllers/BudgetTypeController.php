<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\BudgetType;
use Illuminate\Http\Request;

class BudgetTypeController extends Controller
{
    public function index()
    {
        $budgetTypes = BudgetType::orderBy('name')->get();
        return view('backend.perangkatdesa.apbd.jenisanggaran.index', compact('budgetTypes'));
    }

    public function create()
    {
        return view('backend.perangkatdesa.apbd.jenisanggaran.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:budget_types,name',
            'icon' => 'nullable|string|max:255',
        ]);

        BudgetType::create($request->only('name', 'icon'));

        return redirect()->route('budget_types.index')->with('success', 'Jenis Anggaran berhasil ditambahkan.');
    }

    public function edit(BudgetType $budgetType)
    {
        return view('backend.perangkatdesa.apbd.jenisanggaran.edit', compact('budgetType'));
    }

    public function update(Request $request, BudgetType $budgetType)
    {
        $request->validate([
            'name' => 'required|string|unique:budget_types,name,' . $budgetType->id,
            'icon' => 'nullable|string|max:255',
        ]);

        $budgetType->update($request->only('name', 'icon'));

        return redirect()->route('budget_types.index')->with('success', 'Jenis Anggaran berhasil diperbarui.');
    }

    public function destroy(BudgetType $budgetType)
    {
        $budgetType->delete();

        return redirect()->route('budget_types.index')->with('success', 'Jenis Anggaran berhasil dihapus.');
    }
}
