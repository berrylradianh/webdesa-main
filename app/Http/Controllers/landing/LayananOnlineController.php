<?php

namespace App\Http\Controllers\landing;

use App\Http\Controllers\Controller;
use App\Models\OperationalHour;
use Illuminate\Http\Request;
use App\Models\Template;
use App\Models\PengajuanSurat;
use Illuminate\Support\Facades\Storage;

class LayananOnlineController extends Controller
{
    public function index()
    {
        // Ambil data templates dari database
        $templates = Template::select('id', 'name', 'description', 'file_path')
            ->orderBy('name')
            ->get()
            ->map(function ($template) {
                // Tambah default processing_time dan fee berdasarkan nama
                $defaults = [
                    'processing_time' => '1-3 hari kerja',
                    'fee' => 0,
                ];
                if (stripos($template->name, 'Domisili') !== false) {
                    $defaults['processing_time'] = '1 hari kerja';
                    $defaults['fee'] = 5000;
                } elseif (stripos($template->name, 'KTP') !== false) {
                    $defaults['processing_time'] = '3-5 hari kerja';
                    $defaults['fee'] = 0;
                } elseif (stripos($template->name, 'Usaha') !== false) {
                    $defaults['processing_time'] = '5-7 hari kerja';
                    $defaults['fee'] = 25000;
                }
                return array_merge($template->toArray(), $defaults);
            })
            ->toArray();

        $operationalHours = OperationalHour::orderByRaw("FIELD(day, 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu')")
            ->get();

        return view('landing.pages.layananonline.index', compact('templates', 'operationalHours'));
    }

    public function submit(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'nik' => 'required|string|size:16',
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'phone' => 'required|string|max:15',
            'template_id' => 'required|integer|exists:templates,id',
        ]);

        // Simpan ke tabel pengajuan_surat
        PengajuanSurat::create([
            'template_id' => $validated['template_id'],
            'user_id' => 1, // Default user_id = 1
            'nik' => $validated['nik'],
            'nama_lengkap' => $validated['name'],
            'alamat' => $validated['address'],
            'no_telepon' => $validated['phone'],
            'status' => 'pending',
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('landing.layanan')->with('success', 'Pengajuan berhasil dikirim!');
    }

    public function checkStatus(Request $request)
    {
        $validated = $request->validate([
            'nik' => 'required|string|size:16',
        ]);

        // Cari pengajuan berdasarkan NIK
        $pengajuan = PengajuanSurat::where('nik', $validated['nik'])->first();

        if ($pengajuan) {
            return redirect()->back()->with('success', 'Status untuk NIK ' . $validated['nik'] . ': ' . $pengajuan->status);
        }

        return redirect()->back()->with('error', 'Pengajuan tidak ditemukan.');
    }

    public function download($id)
    {
        $template = Template::findOrFail($id);

        if ($template->file_path && Storage::disk('public')->exists($template->file_path)) {
            return Storage::disk('public')->download($template->file_path);
        }

        return redirect()->back()->with('error', 'File template belum tersedia.');
    }
}
