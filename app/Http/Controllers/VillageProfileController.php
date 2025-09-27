<?php

namespace App\Http\Controllers;

use App\Models\VillageProfile;
use Illuminate\Http\Request;

class VillageProfileController extends Controller
{
    public function index()
    {
        $profiles = VillageProfile::all();
        return view('backend.perangkatdesa.desa.index', compact('profiles'));
    }

    public function create()
    {
        return view('backend.perangkatdesa.desa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'village_name' => 'required|string|max:100',
            'profile' => 'required|string',
            'history' => 'nullable|string',
        ]);

        VillageProfile::create([
            'user_id' => session('user_id'),
            'village_name' => $request->village_name,
            'profile' => $request->profile,
            'history' => $request->history,
        ]);

        return redirect()->route('perangkat.desa.index')->with('success', 'Profil desa berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $profile = VillageProfile::where('user_id', session('user_id'))->findOrFail($id);
        return view('backend.perangkatdesa.desa.edit', compact('profile'));
    }

    public function update(Request $request, $id)
    {
        $profile = VillageProfile::where('user_id', session('user_id'))->findOrFail($id);

        $request->validate([
            'village_name' => 'required|string|max:100',
            'profile' => 'required|string',
            'history' => 'nullable|string',
        ]);

        $profile->update($request->only(['village_name', 'profile', 'history']));

        return redirect()->route('perangkat.desa.index')->with('success', 'Profil desa berhasil diperbarui.');
    }
}
