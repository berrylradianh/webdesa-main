<?php

namespace App\Http\Controllers;

use App\Models\Bumd;
use App\Models\VillageProfile;
use Illuminate\Http\Request;

class BumdController extends Controller
{
    public function index()
    {
        $profiles = Bumd::all();
        return view('backend.perangkatdesa.bumd.index', compact('profiles'));
    }

    public function create()
    {
        return view('backend.perangkatdesa.bumd.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:100',
            'address' => 'nullable|string',
            'contact' => 'nullable|string|max:100',
            'establishment_date' => 'nullable|date',
            'description' => 'nullable|string',
            'capital' => 'nullable|numeric|min:0',
            'status' => 'required|in:active,inactive',
        ]);

        Bumd::create($validated);

        return redirect()->route('perangkat.bumd.index')->with('success', 'Data BUMD berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $profile = Bumd::findOrFail($id);
        return view('backend.perangkatdesa.bumd.edit', compact('profile'));
    }

    public function update(Request $request, $id)
    {
        $profile = Bumd::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:100',
            'address' => 'nullable|string',
            'contact' => 'nullable|string|max:100',
            'establishment_date' => 'nullable|date',
            'description' => 'nullable|string',
            'capital' => 'nullable|numeric|min:0',
            'status' => 'required|in:active,inactive',
        ]);

        $profile->update($validated);

        return redirect()->route('perangkat.bumd.index')->with('success', 'Data BUMD berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $profile = Bumd::findOrFail($id);
        $profile->delete();

        return redirect()->route('perangkat.bumd.index')->with('success', 'Data BUMD berhasil dihapus.');
    }
}
