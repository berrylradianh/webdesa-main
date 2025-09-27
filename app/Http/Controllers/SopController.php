<?php

namespace App\Http\Controllers;

use App\Models\Sop;
use Illuminate\Http\Request;

class SopController extends Controller
{
    /**
     * Tampilkan semua SOP
     */
    public function index()
    {
        $sops = Sop::orderBy('id', 'desc')->get();
        return view('backend.admin.faqsop.sop.index', compact('sops'));
    }

    /**
     * Form tambah SOP
     */
    public function create()
    {
        return view('backend.admin.faqsop.sop.create');
    }

    /**
     * Simpan SOP baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        Sop::create([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => session('user_id'), // wajib diisi
        ]);

        return redirect()->route('sop.index')->with('success', 'SOP berhasil ditambahkan.');
    }

    /**
     * Form edit SOP
     */
    public function edit($id)
    {
        $sop = Sop::findOrFail($id);
        return view('backend.admin.faqsop.sop.edit', compact('sop'));
    }

    /**
     * Update SOP
     */
    public function update(Request $request, $id)
    {
        $sop = Sop::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $sop->update([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => session('user_id'), // optional update, bisa juga dihapus
        ]);

        return redirect()->route('sop.index')->with('success', 'SOP berhasil diperbarui.');
    }

    /**
     * Hapus SOP
     */
    public function destroy($id)
    {
        $sop = Sop::findOrFail($id);
        $sop->delete();

        return redirect()->route('sop.index')->with('success', 'SOP berhasil dihapus.');
    }
}
