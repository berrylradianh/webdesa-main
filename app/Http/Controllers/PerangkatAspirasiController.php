<?php

namespace App\Http\Controllers;

use App\Models\Aspirasi;
use App\Models\AspirasiTanggapan;
use Illuminate\Http\Request;

class PerangkatAspirasiController extends Controller
{
    /**
     * List aspirasi untuk Perangkat Desa
     */
    public function index()
    {
        $aspirasi = Aspirasi::with('warga')->latest()->paginate(10);
        return view('backend.perangkatdesa.aspirasi.index', compact('aspirasi'));
    }

    /**
     * Form edit untuk PD
     */
    public function edit($id)
    {
        $aspirasi = Aspirasi::with('warga', 'tanggapan')->findOrFail($id);
        return view('backend.perangkatdesa.aspirasi.edit', compact('aspirasi'));
    }

    /**
     * PD membuat / update draft tanggapan
     */
    public function storeDraft(Request $request, $id)
    {
        $request->validate([
            'draft_tanggapan' => 'required|string',
            'status' => 'required|in:Menunggu,Diproses,Ditolak',
        ]);

        AspirasiTanggapan::updateOrCreate(
            [
                'aspirasi_id' => $id,
                'tipe' => 'draft',
            ],
            [
                'user_id' => session('user_id'),
                'isi' => $request->draft_tanggapan,
            ]
        );

        // Update status aspirasi
        Aspirasi::where('id', $id)->update([
            'status' => $request->status,
        ]);

        return redirect()->route('perangkat.aspirasi.index')
            ->with('success', 'Draft tanggapan berhasil disimpan.');
    }

    /**
     * Update status oleh PD (opsional)
     */
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:Diproses,Ditolak,Selesai',
        ]);

        Aspirasi::where('id', $id)->update([
            'status' => $request->status,
        ]);

        return back()->with('success', 'Status aspirasi berhasil diperbarui.');
    }
}
