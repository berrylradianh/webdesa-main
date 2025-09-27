<?php

namespace App\Http\Controllers;

use App\Models\MutasiKependudukan;
use App\Models\DataKependudukan;
use Illuminate\Http\Request;

class MutasiKependudukanController extends Controller
{
    /**
     * INDEX - Perangkat Desa
     */
    public function index()
    {
        $mutasi = MutasiKependudukan::whereHas('dataKependudukan', function ($q) {
            $q->where('user_id', session('user_id'));
        })
            ->with('dataKependudukan')
            ->join('data_kependudukan', 'mutasi_kependudukan.data_kependudukan_id', '=', 'data_kependudukan.id')
            ->orderBy('data_kependudukan.tahun', 'asc')
            ->select('mutasi_kependudukan.*')
            ->paginate(10);

        return view('backend.perangkatdesa.kependudukan.mutasi.index', compact('mutasi'));
    }

    /**
     * CREATE - Form input
     */
    public function create()
    {
        $dataKependudukan = DataKependudukan::where('user_id', session('user_id'))->get();

        if ($dataKependudukan->isEmpty()) {
            return redirect()->route('perangkat.kependudukan.index')
                ->with('error', 'Anda belum memiliki data kependudukan. Silakan buat data kependudukan terlebih dahulu.');
        }

        return view('backend.perangkatdesa.kependudukan.mutasi.create', compact('dataKependudukan'));
    }

    /**
     * STORE - Simpan data
     */
    public function store(Request $request)
    {
        $request->validate([
            'data_kependudukan_id' => 'required|exists:data_kependudukan,id',
            'lahir' => 'required|integer',
            'meninggal' => 'required|integer',
            'pindah_keluar' => 'required|integer',
            'pindah_masuk' => 'required|integer',
        ]);

        $dataKependudukan = DataKependudukan::where('id', $request->data_kependudukan_id)
            ->where('user_id', session('user_id'))
            ->firstOrFail();

        MutasiKependudukan::create([
            'data_kependudukan_id' => $dataKependudukan->id,
            'tahun' => $dataKependudukan->tahun, // ambil dari DataKependudukan
            'lahir' => $request->lahir,
            'meninggal' => $request->meninggal,
            'pindah_keluar' => $request->pindah_keluar,
            'pindah_masuk' => $request->pindah_masuk,
            'status' => 'pending'
        ]);

        return redirect()->route('perangkat.kependudukan.mutasi.index')
            ->with('success', 'Mutasi berhasil ditambahkan.');
    }

    /**
     * EDIT - Form edit
     */
    public function edit($id)
    {
        $mutasi = MutasiKependudukan::findOrFail($id);
        $dataKependudukan = DataKependudukan::where('user_id', session('user_id'))->get();

        return view('backend.perangkatdesa.kependudukan.mutasi.edit', compact('mutasi', 'dataKependudukan'));
    }

    /**
     * UPDATE - Update data
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'data_kependudukan_id' => 'required|exists:data_kependudukan,id',
            'lahir' => 'required|integer',
            'meninggal' => 'required|integer',
            'pindah_keluar' => 'required|integer',
            'pindah_masuk' => 'required|integer',
        ]);

        // Ambil data mutasi
        $mutasi = MutasiKependudukan::findOrFail($id);

        // Ambil tahun dari DataKependudukan yang dipilih
        $dataKependudukan = DataKependudukan::where('id', $request->data_kependudukan_id)
            ->where('user_id', session('user_id'))
            ->firstOrFail();

        $mutasi->update([
            'data_kependudukan_id' => $dataKependudukan->id,
            'tahun' => $dataKependudukan->tahun,
            'lahir' => $request->lahir,
            'meninggal' => $request->meninggal,
            'pindah_keluar' => $request->pindah_keluar,
            'pindah_masuk' => $request->pindah_masuk,
            'status' => 'pending',
        ]);

        return redirect()->route('perangkat.kependudukan.mutasi.index')
            ->with('success', 'Mutasi berhasil diperbarui dan status kembali ke pending.');
    }

    /**
     * DESTROY - Hapus data
     */
    public function destroy($id)
    {
        $mutasi = MutasiKependudukan::findOrFail($id);
        $mutasi->delete();

        return redirect()->route('perangkat.kependudukan.mutasi.index')->with('success', 'Mutasi berhasil dihapus.');
    }

    /**
     * ADMIN - Index
     */
    public function adminIndex()
    {
        $mutasi = MutasiKependudukan::with('dataKependudukan.user')
            ->join('data_kependudukan', 'mutasi_kependudukan.data_kependudukan_id', '=', 'data_kependudukan.id')
            ->orderBy('data_kependudukan.tahun', 'desc')
            ->select('mutasi_kependudukan.*') // supaya tidak konflik kolom
            ->paginate(10);

        return view('backend.admin.kependudukan.mutasi.index', compact('mutasi'));
    }

    /**
     * ADMIN - Update status mutasi (approve/reject)
     */
    public function mutasiUpdateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:approved,rejected',
        ]);

        $mutasi = MutasiKependudukan::findOrFail($id);
        $mutasi->status = $request->status;
        $mutasi->catatan_admin = $request->catatan_admin;
        $mutasi->save();

        return redirect()->back()->with('success', 'Status mutasi berhasil diupdate.');
    }
}
