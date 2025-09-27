<?php

namespace App\Http\Controllers;

use App\Models\PengajuanSurat;
use App\Models\Template;
use Illuminate\Http\Request;

class PengajuanSuratController extends Controller
{
    /**
     * List semua pengajuan surat (khusus Admin & PD).
     */
    public function adminIndex()
    {
        $pengajuan = PengajuanSurat::with(['warga', 'processor', 'template'])
            ->latest()
            ->paginate(10);

        return view('backend.admin.pengajuan.index', compact('pengajuan'));
    }


    /**
     * Form ajukan surat baru (khusus Warga).
     */
    public function create()
    {
        $templates = Template::all();
        return view('frontend.pengajuan.create', compact('templates'));
    }

    /**
     * Simpan pengajuan baru (Warga).
     */
    public function store(Request $request)
    {
        $request->validate([
            'template_id' => 'required|exists:templates,id',
            'nama' => 'required|string',
            'nik' => 'required|string',
            'keperluan' => 'required|string',
        ]);

        $dataPengajuan = [
            'nama' => $request->nama,
            'nik' => $request->nik,
            'keperluan' => $request->keperluan,
        ];

        PengajuanSurat::create([
            'template_id' => $request->template_id,
            'user_id' => session('user_id'),
            'status' => 'pending',
            'keterangan' => json_encode($dataPengajuan),
        ]);

        return redirect()->route('pengajuan.index')
            ->with('success', 'Pengajuan surat berhasil dikirim!');
    }

    /**
     * Update status (hanya PD & Admin).
     */
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,diproses,selesai,ditolak',
            'keterangan' => 'nullable|string',
        ]);

        $pengajuan = PengajuanSurat::findOrFail($id);
        $pengajuan->update([
            'status' => $request->status,
            'keterangan' => $request->keterangan,
            'processed_by' => session('user_id'), // siapa yang proses
        ]);

        return back()->with('success', 'Status pengajuan berhasil diperbarui!');
    }

    /**
     * Override status (khusus Admin).
     */
    public function overrideStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,diproses,selesai,ditolak',
        ]);

        $pengajuan = PengajuanSurat::findOrFail($id);

        // Cek apakah belum diproses perangkat desa (processed_by kosong/null)
        if (empty($pengajuan->processed_by)) {
            return back()->with('error', 'Pengajuan ini belum diproses oleh perangkat desa, tidak bisa dioverride.');
        }

        $pengajuan->update([
            'status' => $request->status,
            'override_status' => true, // flag override
            'processed_by' => session('user_id'),
        ]);

        return back()->with('success', 'Status berhasil dioverride oleh Admin!');
    }

    /**
     * Hapus pengajuan (opsional, biasanya oleh Admin).
     */
    public function destroy($id)
    {
        $pengajuan = PengajuanSurat::findOrFail($id);
        $pengajuan->delete();

        return back()->with('success', 'Pengajuan surat berhasil dihapus.');
    }
}
