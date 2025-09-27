<?php

namespace App\Http\Controllers;

use App\Models\Aspirasi;
use App\Models\AspirasiTanggapan;
use Illuminate\Http\Request;

class AdminAspirasiController extends Controller
{
    /**
     * List aspirasi untuk Admin
     */
    public function index()
    {
        $aspirasi = Aspirasi::with('warga')->latest()->paginate(10);
        return view('backend.admin.aspirasi.index', compact('aspirasi'));
    }

    /**
     * Form edit untuk Admin
     */
    public function edit($id)
    {
        $aspirasi = Aspirasi::with('warga', 'tanggapan')->findOrFail($id);
        return view('backend.admin.aspirasi.edit', compact('aspirasi'));
    }

    /**
     * Admin menyetujui / finalisasi tanggapan
     */
    public function approve(Request $request, $id)
    {
        $request->validate([
            'isi' => 'required|string',
        ]);

        // Simpan tanggapan final di tabel aspirasi_tanggapans
        AspirasiTanggapan::updateOrCreate(
            [
                'aspirasi_id' => $id,
                'tipe' => 'final',
            ],
            [
                'user_id' => session('user_id'),
                'isi' => $request->isi,
            ]
        );

        // Update tanggapan_final di tabel aspirasi
        Aspirasi::where('id', $id)->update([
            'tanggapan_final' => $request->isi,
        ]);

        return redirect()->route('admin.aspirasi.index')
            ->with('success', 'Tanggapan final berhasil dipublikasikan.');
    }
}
