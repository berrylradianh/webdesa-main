<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\GalleryItem;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
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

        $galleries = Gallery::orderBy('tanggal', 'desc')->paginate(10);

        if ($user->role->id == 1) {
            return view('backend.admin.gallery.index', compact('galleries'));
        } else {
            return view('backend.perangkatdesa.gallery.index', compact('galleries'));
        }
    }

    // Form buat gallery baru
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
            return view('backend.admin.gallery.create');
        } else {
            return view('backend.perangkatdesa.gallery.create');
        }
    }

    // Simpan gallery baru
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
            'tanggal' => 'required|date',
            'jam' => 'required',
            'items.*' => 'required|file|mimes:jpg,jpeg,png,gif,webp,mp4,mov,avi|max:10240'
        ]);

        // Buat gallery
        $gallery = Gallery::create([
            'judul' => $request->judul,
            'tanggal' => $request->tanggal,
            'jam' => $request->jam,
            'user_id' => session('user_id'),
        ]);

        // Upload file (foto/video)
        if ($request->hasFile('items')) {
            foreach ($request->file('items') as $file) {
                $path = $file->store('gallery', 'public');

                $type = in_array(strtolower($file->extension()), ['mp4', 'mov', 'avi']) ? 'video' : 'foto';

                GalleryItem::create([
                    'gallery_id' => $gallery->id,
                    'file' => $path,
                    'type' => $type,
                ]);
            }
        }

        if ($user->role->id == 1) {
            return redirect()->route('admin.gallery.index')
                ->with('success', 'Gallery berhasil dibuat.');
        } else {
            return redirect()->route('perangkat.gallery.index')
                ->with('success', 'Gallery berhasil dibuat.');
        }
    }

    // Form edit gallery
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

        $gallery = Gallery::with('items')->findOrFail($id);

        if ($user->role->id == 1) {
            return view('backend.admin.gallery.edit', compact('gallery'));
        } else {
            return view('backend.perangkatdesa.gallery.edit', compact('gallery'));
        }
    }

    // Update gallery
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

        $gallery = Gallery::findOrFail($id);

        $request->validate([
            'judul' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'jam' => 'required',
            'items.*' => 'nullable|file|mimes:jpg,jpeg,png,gif,webp,mp4,mov,avi|max:10240'
        ]);

        $gallery->update([
            'judul' => $request->judul,
            'tanggal' => $request->tanggal,
            'jam' => $request->jam,
        ]);

        // Upload file baru
        if ($request->hasFile('items')) {
            foreach ($request->file('items') as $file) {
                $path = $file->store('gallery', 'public');
                $type = in_array(strtolower($file->extension()), ['mp4', 'mov', 'avi']) ? 'video' : 'foto';

                GalleryItem::create([
                    'gallery_id' => $gallery->id,
                    'file' => $path,
                    'type' => $type,
                ]);
            }
        }

        if ($user->role->id == 1) {
            return redirect()->route('admin.gallery.index')
                ->with('success', 'Gallery berhasil diperbarui.');
        } else {
            return redirect()->route('perangkat.gallery.index')
                ->with('success', 'Gallery berhasil diperbarui.');
        }
    }

    // Hapus gallery beserta item
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

        $gallery = Gallery::with('items')->findOrFail($id);

        foreach ($gallery->items as $item) {
            Storage::disk('public')->delete($item->file);
            $item->delete();
        }

        $gallery->delete();

        if ($user->role->id == 1) {
            return redirect()->route('admin.gallery.index')
                ->with('success', 'Gallery berhasil dihapus.');
        } else {
            return redirect()->route('perangkat.gallery.index')
                ->with('success', 'Gallery berhasil dihapus.');
        }
    }

    // Hapus item tertentu
    public function destroyItem($id)
    {
        $userId = session('user_id');
        if (!$userId) {
            return redirect()->route('login')->with('error', 'Anda harus login terlebih dahulu.');
        }

        $user = User::with('role')->find($userId);
        if (!$user || !$user->role) {
            return redirect()->route('login')->with('error', 'Data user tidak valid.');
        }

        $item = GalleryItem::findOrFail($id);
        Storage::disk('public')->delete($item->file);
        $item->delete();

        if ($user->role->id == 1) {
            return back()->with('success', 'Item berhasil dihapus.');
        } else {
            return back()->with('success', 'Item berhasil dihapus.');
        }
    }
}
