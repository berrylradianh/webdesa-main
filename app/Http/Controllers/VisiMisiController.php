<?php

namespace App\Http\Controllers;

use App\Models\VisiMisi;
use App\Models\Misi;
use Illuminate\Http\Request;

class VisiMisiController extends Controller
{
    // Tampilkan semua visi & misi
    public function index()
    {
        $visiMisi = VisiMisi::with('misi')
            ->first();

        return view('backend.perangkatdesa.visi-misi.index', compact('visiMisi'));
    }

    // Form tambah
    public function create()
    {
        return view('backend.perangkatdesa.visi-misi.create');
    }

    // Simpan data baru
    public function store(Request $request)
    {
        $request->validate([
            'visi' => 'required|string|max:5000',
            'misi_items.*' => 'required|string',
        ]);

        $userId = session('user_id');

        $visiMisi = VisiMisi::create([
            'visi' => $request->visi,
            'user_id' => $userId,
        ]);

        foreach ($request->misi_items as $item) {
            if ($item) {
                Misi::create([
                    'visi_misi_id' => $visiMisi->id,
                    'misi' => $item,
                ]);
            }
        }

        return redirect()->route('perangkat.visi-misi.index')
            ->with('success', 'Visi & Misi berhasil ditambahkan.');
    }

    // Form edit
    public function edit($id)
    {
        $visiMisi = VisiMisi::with('misi')
            ->where('user_id', session('user_id'))
            ->findOrFail($id);

        return view('backend.perangkatdesa.visi-misi.edit', compact('visiMisi'));
    }

    // Update data
    public function update(Request $request, $id)
    {
        $request->validate([
            'visi' => 'required|string|max:5000',
            'misi_items.*' => 'required|string',
        ]);

        $visiMisi = VisiMisi::where('user_id', session('user_id'))->findOrFail($id);
        $visiMisi->update(['visi' => $request->visi]);

        // Hapus misi lama
        $visiMisi->misi()->delete();

        foreach ($request->misi_items as $item) {
            if ($item) {
                Misi::create([
                    'visi_misi_id' => $visiMisi->id,
                    'misi' => $item,
                ]);
            }
        }

        return redirect()->route('perangkat.visi-misi.index')
            ->with('success', 'Visi & Misi berhasil diperbarui.');
    }

    // Hapus
    public function destroy($id)
    {
        $visiMisi = VisiMisi::where('user_id', session('user_id'))->findOrFail($id);
        $visiMisi->delete();

        return redirect()->route('perangkat.visi-misi.index')
            ->with('success', 'Visi & Misi berhasil dihapus.');
    }
}
