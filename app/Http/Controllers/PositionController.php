<?php

namespace App\Http\Controllers;

use App\Models\Position;
use App\Models\User;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    /**
     * Tampilkan daftar struktur organisasi.
     */
    public function index()
    {
        $positions = Position::with(['parent', 'user'])
            ->orderBy('type', 'asc')
            ->orderBy('parent_id', 'asc')
            ->paginate(10);

        return view('backend.admin.struktur.index', compact('positions'));
    }

    /**
     * Form tambah posisi baru.
     */
    public function create()
    {
        $users = User::all();
        $parents = Position::all();
        $types = ['pemerintah', 'bpd', 'lembaga'];

        return view('backend.admin.struktur.create', compact('users', 'parents', 'types'));
    }

    /**
     * Simpan posisi baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'user_id' => 'nullable|exists:users,id',
            'parent_id' => 'nullable|exists:positions,id',
            'type' => 'required|in:pemerintah,bpd,lembaga',
        ]);

        Position::create($request->all());

        return redirect()->route('admin.positions.index')->with('success', 'Posisi berhasil ditambahkan.');
    }

    /**
     * Form edit posisi.
     */
    public function edit($id)
    {
        $position = Position::findOrFail($id);
        $users = User::all();
        $parents = Position::where('id', '!=', $id)->get();
        $types = ['pemerintah', 'bpd', 'lembaga'];

        return view('backend.admin.struktur.edit', compact('position', 'users', 'parents', 'types'));
    }

    /**
     * Update posisi.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'user_id' => 'nullable|exists:users,id',
            'parent_id' => 'nullable|exists:positions,id',
            'type' => 'required|in:pemerintah,bpd,lembaga',
        ]);

        $position = Position::findOrFail($id);
        $position->update($request->all());

        return redirect()->route('admin.positions.index')->with('success', 'Posisi berhasil diperbarui.');
    }

    /**
     * Hapus posisi.
     */
    public function destroy($id)
    {
        $position = Position::findOrFail($id);
        $position->delete();

        return redirect()->route('admin.positions.index')->with('success', 'Posisi berhasil dihapus.');
    }
}
