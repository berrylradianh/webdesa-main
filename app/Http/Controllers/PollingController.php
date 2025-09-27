<?php

namespace App\Http\Controllers;

use App\Models\Polling;
use App\Models\PollingOption;
use Illuminate\Http\Request;

class PollingController extends Controller
{
    public function index()
    {
        $pollings = Polling::with(['options.answers'])->orderBy('id', 'asc')->get();
        return view('backend.admin.pollings.index', compact('pollings'));
    }

    public function create()
    {
        return view('backend.admin.pollings.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'options' => 'required|array|min:2', // minimal 2 opsi
            'options.*' => 'required|string|max:255',
        ]);

        $polling = Polling::create([
            'title' => $request->title,
            'user_id' => session('user_id'), // admin yg buat
        ]);

        foreach ($request->options as $option_text) {
            $polling->options()->create(['option_text' => $option_text]);
        }

        return redirect()->route('polling.index')->with('success', 'Polling berhasil dibuat.');
    }

    public function edit($id)
    {
        $polling = Polling::with('options')->findOrFail($id);
        return view('backend.admin.pollings.edit', compact('polling'));
    }

    public function update(Request $request, $id)
    {
        $polling = Polling::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'options' => 'required|array|min:2',
            'options.*' => 'required|string|max:255',
        ]);

        $polling->update(['title' => $request->title]);

        // Update options: hapus dulu semua, baru insert baru
        $polling->options()->delete();
        foreach ($request->options as $option_text) {
            $polling->options()->create(['option_text' => $option_text]);
        }

        return redirect()->route('polling.index')->with('success', 'Polling berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $polling = Polling::findOrFail($id);
        $polling->delete();
        return redirect()->route('polling.index')->with('success', 'Polling berhasil dihapus.');
    }
}
