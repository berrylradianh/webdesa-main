<?php

namespace App\Http\Controllers;

use App\Models\VillageOfficialProfile;
use App\Models\Position;
use Illuminate\Http\Request;

class VillageOfficialProfileController extends Controller
{
    /**
     * List semua profil perangkat desa
     */
    public function index()
    {
        $profiles = VillageOfficialProfile::with('position')
            ->latest()
            ->paginate(10); // pagination

        return view('backend.perangkatdesa.village_profiles.index', compact('profiles'));
    }

    /**
     * Form tambah profil perangkat
     */
    public function create()
    {
        $positions = Position::all();
        return view('backend.perangkatdesa.village_profiles.create', compact('positions'));
    }

    /**
     * Simpan profil perangkat baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'nik' => 'required|string|max:100',
            'position_id' => 'required|exists:positions,id',
            'address' => 'nullable|string|max:100',
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:100',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('profiles', 'public');
        }

        VillageOfficialProfile::create([
            'user_id' => session('user_id'),
            'position_id' => $request->position_id,
            'name' => $request->name,
            'nik' => $request->nik,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
            'photo' => $photoPath,
        ]);

        return redirect()->route('perangkat.villageprofile.index')->with('success', 'Profil perangkat berhasil ditambahkan.');
    }

    /**
     * Form edit
     */
    public function edit($id)
    {
        $profile = VillageOfficialProfile::where('user_id', session('user_id'))->findOrFail($id);
        $positions = Position::all();

        return view('backend.perangkatdesa.village_profiles.edit', compact('profile', 'positions'));
    }

    /**
     * Update profil perangkat
     */
    public function update(Request $request, $id)
    {
        $profile = VillageOfficialProfile::where('user_id', session('user_id'))->findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:100',
            'nik' => 'required|string|max:100',
            'position_id' => 'required|exists:positions,id',
            'address' => 'nullable|string|max:100',
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:100',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only(['name', 'nik', 'position_id', 'address', 'phone', 'email']);

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('profiles', 'public');
            $data['photo'] = $photoPath;
        }

        $profile->update($data);

        return redirect()->route('perangkat.villageprofile.index')->with('success', 'Profil perangkat berhasil diperbarui.');
    }

    /**
     * Hapus profil perangkat
     */
    public function destroy($id)
    {
        $profile = VillageOfficialProfile::where('user_id', session('user_id'))->findOrFail($id);

        $profile->delete();

        return redirect()->route('perangkat.villageprofile.index')->with('success', 'Profil perangkat berhasil dihapus.');
    }
}
