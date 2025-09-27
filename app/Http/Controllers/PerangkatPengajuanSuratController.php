<?php

namespace App\Http\Controllers;

use App\Models\PengajuanSurat;
use Illuminate\Http\Request;

class PerangkatPengajuanSuratController extends Controller
{
    /**
     * Daftar semua pengajuan surat dari warga (untuk PD).
     */
    public function index()
    {
        $pengajuan = PengajuanSurat::with(['warga', 'template', 'processor'])
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('backend.perangkatdesa.pengajuan.index', compact('pengajuan'));
    }

    /**
     * Detail pengajuan surat (untuk PD).
     */
    public function show($id)
    {
        $pengajuan = PengajuanSurat::with(['warga', 'template', 'processor'])->findOrFail($id);

        return view('backend.perangkatdesa.pengajuan.show', compact('pengajuan'));
    }

    /**
     * Update status pengajuan oleh PD.
     */
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:diproses,selesai,ditolak',
            'keperluan' => 'nullable|string',
        ]);

        $pengajuan = PengajuanSurat::findOrFail($id);

        // Update status dan processed_by
        $pengajuan->status = $request->status;
        $pengajuan->processed_by = session('user_id');

        // Hanya tambahkan keterangan jika diisi PD
        if ($request->filled('keperluan')) {
            // Bisa digabung dengan isi sebelumnya agar catatan tidak hilang
            $pengajuan->keperluan = $pengajuan->keperluan
                ? $pengajuan->keperluan . "\n[PD] " . $request->keperluan
                : $request->keperluan;
        }

        $pengajuan->save();

        return back()->with('success', 'Status pengajuan berhasil diperbarui oleh Perangkat Desa.');
    }

    /**
     * Cetak surat (opsional: generate PDF atau preview).
     */
    public function cetak($id)
    {
        $pengajuan = PengajuanSurat::with(['warga', 'template', 'processor'])->findOrFail($id);

        // Contoh return view cetak
        return view('backend.perangkatdesa.pengajuan.cetak', compact('pengajuan'));
    }
}
