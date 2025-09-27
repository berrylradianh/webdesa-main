<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\User;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    /**
     * Tampilkan daftar agenda
     */
    public function index()
    {
        $userId = session('user_id');
        if (!$userId) {
            return redirect()->route('login')->with('error', 'Anda harus login terlebih dahulu.');
        }

        $user = User::with('role')->find($userId);
        if (!$user || !$user->role) {
            return redirect()->route('login')->with('error', 'Data user tidak valid.');
        }

        $agendas = Agenda::with('user')->orderBy('tanggal_mulai', 'desc')->paginate(10);

        if ($user->role->id == 1) {
            return view('backend.admin.agenda.index', compact('agendas'));
        } else {
            return view('backend.perangkatdesa.agenda.index', compact('agendas'));
        }
    }

    /**
     * Form untuk membuat agenda baru
     */
    public function create()
    {
        $userId = session('user_id');
        if (!$userId) {
            return redirect()->route('login')->with('error', 'Anda harus login terlebih dahulu.');
        }

        $user = User::with('role')->find($userId);
        if (!$user || !$user->role) {
            return redirect()->route('login')->with('error', 'Data user tidak valid.');
        }

        if ($user->role->id == 1) {
            return view('backend.admin.agenda.create');
        } else {
            return view('backend.perangkatdesa.agenda.create');
        }
    }

    /**
     * Simpan agenda baru
     */
    public function store(Request $request)
    {
        $userId = session('user_id');
        if (!$userId) {
            return redirect()->route('login')->with('error', 'Anda harus login terlebih dahulu.');
        }

        $user = User::with('role')->find($userId);
        if (!$user || !$user->role) {
            return redirect()->route('login')->with('error', 'Data user tidak valid.');
        }

        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'nullable|date|after_or_equal:tanggal_mulai',
            'lokasi' => 'nullable|string|max:255',
            'status' => 'required|in:draft,published',
        ]);

        Agenda::create([
            'user_id' => session('user_id'), // mengambil ID user dari session
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'lokasi' => $request->lokasi,
            'status' => $request->status,
        ]);

        if ($user->role->id == 1) {
            return redirect()->route('admin.agenda.index')
                ->with('success', 'Agenda berhasil ditambahkan.');
        } else {
            return redirect()->route('perangkat.agenda.index')
                ->with('success', 'Agenda berhasil ditambahkan.');
        }
    }

    /**
     * Form edit agenda
     */
    public function edit($id)
    {
        $userId = session('user_id');
        if (!$userId) {
            return redirect()->route('login')->with('error', 'Anda harus login terlebih dahulu.');
        }

        $user = User::with('role')->find($userId);
        if (!$user || !$user->role) {
            return redirect()->route('login')->with('error', 'Data user tidak valid.');
        }

        $agenda = Agenda::findOrFail($id);

        if ($user->role->id == 1) {
            return view('backend.admin.agenda.edit', compact('agenda'));
        } else {
            return view('backend.perangkatdesa.agenda.edit', compact('agenda'));
        }
    }

    /**
     * Update agenda
     */
    public function update(Request $request, $id)
    {
        $userId = session('user_id');
        if (!$userId) {
            return redirect()->route('login')->with('error', 'Anda harus login terlebih dahulu.');
        }

        $user = User::with('role')->find($userId);
        if (!$user || !$user->role) {
            return redirect()->route('login')->with('error', 'Data user tidak valid.');
        }

        $agenda = Agenda::findOrFail($id);

        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'nullable|date|after_or_equal:tanggal_mulai',
            'lokasi' => 'nullable|string|max:255',
            'status' => 'required|in:draft,published',
        ]);

        $agenda->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'lokasi' => $request->lokasi,
            'status' => $request->status,
        ]);

        if ($user->role->id == 1) {
            return redirect()->route('admin.agenda.index')
                ->with('success', 'Agenda berhasil diperbarui.');
        } else {
            return redirect()->route('perangkat.agenda.index')
                ->with('success', 'Agenda berhasil diperbarui.');
        }
    }

    /**
     * Hapus agenda
     */
    public function destroy($id)
    {
        $userId = session('user_id');
        if (!$userId) {
            return redirect()->route('login')->with('error', 'Anda harus login terlebih dahulu.');
        }

        $user = User::with('role')->find($userId);
        if (!$user || !$user->role) {
            return redirect()->route('login')->with('error', 'Data user tidak valid.');
        }

        $agenda = Agenda::findOrFail($id);
        $agenda->delete();

        if ($user->role->id == 1) {
            return redirect()->route('admin.agenda.index')
                ->with('success', 'Agenda berhasil dihapus.');
        } else {
            return redirect()->route('perangkat.agenda.index')
                ->with('success', 'Agenda berhasil dihapus.');
        }
    }
}
