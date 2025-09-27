<?php

namespace App\Http\Controllers;

use App\Models\OperationalHour;
use Illuminate\Http\Request;

class OperationalHourController extends Controller
{
    /**
     * Tampilkan daftar jam operasional.
     */
    public function index()
    {
        $jamOperasional = OperationalHour::where('user_id', session('user_id'))
            ->orderByRaw("FIELD(day, 'Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu')")
            ->get();

        return view('backend.perangkatdesa.operational_hours.index', compact('jamOperasional'));
    }

    /**
     * Form tambah data.
     */
    public function create()
    {
        $days = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
        return view('backend.perangkatdesa.operational_hours.create', compact('days'));
    }

    /**
     * Simpan data baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'day' => 'required|string',
            'open_time' => 'nullable|date_format:H:i',
            'close_time' => 'nullable|date_format:H:i|after_or_equal:open_time',
        ]);

        OperationalHour::create([
            'user_id' => session('user_id'),
            'day' => $request->day,
            'open_time' => $request->open_time,
            'close_time' => $request->close_time,
            'is_closed' => $request->has('is_closed'),
        ]);

        return redirect()->route('perangkat.operationalhours.index')
            ->with('success', 'Jam operasional berhasil ditambahkan.');
    }

    /**
     * Form edit.
     */
    public function edit($id)
    {
        $operationalHour = OperationalHour::where('user_id', session('user_id'))->findOrFail($id);
        $days = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];

        return view('backend.perangkatdesa.operational_hours.edit', compact('operationalHour', 'days'));
    }

    /**
     * Update data.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'day' => 'required|string',
            'open_time' => 'nullable|date_format:H:i',
            'close_time' => 'nullable|date_format:H:i|after_or_equal:open_time',
        ]);

        $operationalHour = OperationalHour::where('user_id', session('user_id'))->findOrFail($id);

        $data = [
            'day' => $request->day,
            'is_closed' => $request->is_closed,
        ];

        if ($request->is_closed) {
            $data['open_time'] = null;
            $data['close_time'] = null;
        } else {
            $data['open_time'] = $request->open_time;
            $data['close_time'] = $request->close_time;
        }

        $operationalHour->update($data);

        return redirect()->route('perangkat.operationalhours.index')
            ->with('success', 'Jam operasional berhasil diperbarui.');
    }

    /**
     * Hapus data.
     */
    public function destroy($id)
    {
        $operationalHour = OperationalHour::where('user_id', session('user_id'))->findOrFail($id);
        $operationalHour->delete();

        return redirect()->route('perangkat.operationalhours.index')
            ->with('success', 'Jam operasional berhasil dihapus.');
    }
}
