<?php

namespace App\Http\Controllers;

use App\Models\DataKependudukan;
use Illuminate\Http\Request;

class DataKependudukanController extends Controller
{
    /**
     * INDEX - Perangkat Desa
     */
    public function index()
    {
        $dataKependudukan = DataKependudukan::where('user_id', session('user_id'))
            ->orderBy('tahun', 'desc')
            ->paginate(10);

        return view('backend.perangkatdesa.kependudukan.data.index', compact('dataKependudukan'));
    }

    /**
     * CREATE - Form input
     */
    public function create()
    {
        return view('backend.perangkatdesa.kependudukan.data.create');
    }

    /**
     * STORE - Simpan data
     */
    public function store(Request $request)
    {
        $request->validate([
            'tahun' => 'required|integer',
            'jumlah_penduduk' => 'required|integer',
            'jumlah_kk' => 'required|integer',
            'jumlah_laki' => 'required|integer',
            'jumlah_perempuan' => 'required|integer',
        ]);

        DataKependudukan::create([
            'user_id' => session('user_id'),
            'tahun' => $request->tahun,
            'jumlah_penduduk' => $request->jumlah_penduduk,
            'jumlah_kk' => $request->jumlah_kk,
            'jumlah_laki' => $request->jumlah_laki,
            'jumlah_perempuan' => $request->jumlah_perempuan,
            'status' => 'pending',
        ]);

        return redirect()->route('perangkat.kependudukan.index')->with('success', 'Data berhasil ditambahkan.');
    }

    /**
     * EDIT - Form edit
     */
    public function edit($id)
    {
        $dataKependudukan = DataKependudukan::findOrFail($id);
        return view('backend.perangkatdesa.kependudukan.data.edit', compact('dataKependudukan'));
    }

    /**
     * UPDATE - Update data
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'tahun' => 'required|integer',
            'jumlah_penduduk' => 'required|integer',
            'jumlah_kk' => 'required|integer',
            'jumlah_laki' => 'required|integer',
            'jumlah_perempuan' => 'required|integer',
        ]);

        $data = DataKependudukan::findOrFail($id);

        $data->update([
            'tahun' => $request->tahun,
            'jumlah_penduduk' => $request->jumlah_penduduk,
            'jumlah_kk' => $request->jumlah_kk,
            'jumlah_laki' => $request->jumlah_laki,
            'jumlah_perempuan' => $request->jumlah_perempuan,
            'status' => 'pending', // reset otomatis ke pending setelah edit
        ]);

        return redirect()->route('perangkat.kependudukan.index')
            ->with('success', 'Data berhasil diperbarui dan status kembali ke pending.');
    }

    /**
     * DESTROY - Hapus data
     */
    public function destroy($id)
    {
        $data = DataKependudukan::findOrFail($id);
        $data->delete();

        return redirect()->route('perangkat.kependudukan.index')->with('success', 'Data berhasil dihapus.');
    }

    /**
     * ADMIN - Lihat semua data
     */
    public function adminIndex()
    {
        $dataKependudukan = DataKependudukan::with('user')
            ->orderBy('tahun', 'desc')
            ->paginate(10);

        return view('backend.admin.kependudukan.data.index', compact('dataKependudukan'));
    }

    /**
     * ADMIN - Update Status
     */
    public function updateStatus(Request $request, $id)
    {
        $data = DataKependudukan::findOrFail($id);
        $data->status = $request->status;
        $data->catatan_admin = $request->catatan_admin;
        $data->save();

        return redirect()->route('admin.kependudukan.index')->with('success', 'Status berhasil diupdate.');
    }


    // public function approve($id, Request $request)
    // {
    //     $data = DataKependudukan::findOrFail($id);
    //     $data->update([
    //         'status' => 'approved',
    //         'catatan_admin' => $request->catatan_admin,
    //     ]);

    //     return back()->with('success', 'Data berhasil disetujui.');
    // }

    // /**
    //  * ADMIN - Reject
    //  */
    // public function reject($id, Request $request)
    // {
    //     $data = DataKependudukan::findOrFail($id);
    //     $data->update([
    //         'status' => 'rejected',
    //         'catatan_admin' => $request->catatan_admin,
    //     ]);

    //     return back()->with('success', 'Data berhasil ditolak.');
    // }
}
