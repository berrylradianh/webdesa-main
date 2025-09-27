<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MemberController extends Controller
{
    public function index()
    {
        $members = Member::with('position')->paginate(10);
        return view('backend.perangkatdesa.members.index', compact('members'));
    }

    public function create()
    {
        $positions = Position::all();
        return view('backend.perangkatdesa.members.create', compact('positions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'nik' => 'nullable|string|max:16',
            'position_id' => 'required|exists:positions,id',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only(['name', 'nik', 'position_id']);

        if ($request->hasFile('image')) {
            $filename = time() . '.' . $request->image->extension();
            $request->image->storeAs('public/members', $filename);
            $data['image'] = $filename;
        }

        Member::create($data);

        return redirect()->route('perangkat.members.index')->with('success', 'Anggota berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $member = Member::findOrFail($id);
        $positions = Position::all();

        return view('backend.perangkatdesa.members.edit', compact('member', 'positions'));
    }

    public function update(Request $request, $id)
    {
        $member = Member::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'nik' => 'nullable|string|max:16',
            'position_id' => 'required|exists:positions,id',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only(['name', 'nik', 'position_id']);

        if ($request->hasFile('image')) {
            if ($member->image) {
                Storage::delete('public/members/' . $member->image);
            }
            $filename = time() . '.' . $request->image->extension();
            $request->image->storeAs('public/members', $filename);
            $data['image'] = $filename;
        }

        $member->update($data);

        return redirect()->route('perangkat.members.index')
            ->with('success', 'Anggota berhasil diperbarui.');
    }


    public function destroy($id)
    {
        $member = Member::findOrFail($id);

        // Hapus foto jika ada
        if ($member->image) {
            Storage::delete('public/members/' . $member->image);
        }

        $member->delete();

        return redirect()->route('perangkat.members.index')
            ->with('success', 'Anggota berhasil dihapus.');
    }
}
