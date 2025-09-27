<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\AnnouncementCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AnnouncementController extends Controller
{
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

        $announcements = Announcement::with(['user', 'category'])
            ->orderBy('created_at', 'asc') // ASC (lama -> baru)
            ->paginate(10);

        if ($user->role->id == 1) {
            return view('backend.admin.pengumuman.index', compact('announcements'));
        } else {
            return view('backend.perangkatdesa.pengumuman.index', compact('announcements'));
        }
    }

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

        $categories = AnnouncementCategory::all(); // ambil semua kategori

        if ($user->role->id == 1) {
            return view('backend.admin.pengumuman.create', compact('categories'));
        } else {
            return view('backend.perangkatdesa.pengumuman.create', compact('categories'));
        }
    }

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
            'isi' => 'required|string',
            'tanggal' => 'nullable|date',
            'category_id' => 'required|exists:announcement_categories,id',
            'status' => 'required|in:draft,published,archived',
            'lampiran' => 'nullable|file|mimes:pdf,jpg,jpeg,png,doc,docx',
            'link' => 'nullable|url',
        ]);

        $lampiranPath = null;
        if ($request->hasFile('lampiran')) {
            $lampiranPath = $request->file('lampiran')->store('lampiran_pengumuman', 'public');
        }

        Announcement::create([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'tanggal' => $request->tanggal,
            'category_id' => $request->category_id,
            'status' => $request->status,
            'lampiran' => $lampiranPath,
            'link' => $request->link,
            'user_id' => session('user_id'),
        ]);

        if ($user->role->id == 1) {
            return redirect()->route('admin.announcement.index')
                ->with('success', 'Pengumuman berhasil ditambahkan.');
        } else {
            return redirect()->route('perangkat.announcement.index')
                ->with('success', 'Pengumuman berhasil ditambahkan.');
        }
    }

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

        $announcement = Announcement::findOrFail($id);
        $categories = AnnouncementCategory::all();

        if ($user->role->id == 1) {
            return view('backend.admin.pengumuman.edit', compact('announcement', 'categories'));
        } else {
            return view('backend.perangkatdesa.pengumuman.edit', compact('announcement', 'categories'));
        }
    }

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

        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'tanggal' => 'nullable|date',
            'category_id' => 'required|exists:announcement_categories,id',
            'status' => 'required|in:draft,published,archived',
            'lampiran' => 'nullable|file|mimes:pdf,jpg,jpeg,png,doc,docx',
            'link' => 'nullable|url',
        ]);

        $announcement = Announcement::findOrFail($id);

        // handle file lampiran baru, hapus file lama jika ada
        if ($request->hasFile('lampiran')) {
            if ($announcement->lampiran) {
                Storage::disk('public')->delete($announcement->lampiran);
            }
            $lampiranPath = $request->file('lampiran')->store('lampiran_pengumuman', 'public');
        } else {
            $lampiranPath = $announcement->lampiran; // tetap file lama jika tidak upload baru
        }

        $announcement->update([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'tanggal' => $request->tanggal,
            'category_id' => $request->category_id,
            'status' => $request->status,
            'lampiran' => $lampiranPath,
            'link' => $request->link,
            'user_id' => session('user_id'),
        ]);

        if ($user->role->id == 1) {
            return redirect()->route('admin.announcement.index')
                ->with('success', 'Pengumuman berhasil diperbarui.');
        } else {
            return redirect()->route('perangkat.announcement.index')
                ->with('success', 'Pengumuman berhasil diperbarui.');
        }
    }

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

        $announcement = Announcement::findOrFail($id);

        // hapus file lampiran jika ada
        if ($announcement->lampiran) {
            Storage::disk('public')->delete($announcement->lampiran);
        }

        $announcement->delete();

        if ($user->role->id == 1) {
            return redirect()->route('admin.announcement.index')
                ->with('success', 'Pengumuman berhasil dihapus.');
        } else {
            return redirect()->route('perangkat.announcement.index')
                ->with('success', 'Pengumuman berhasil dihapus.');
        }
    }
}
