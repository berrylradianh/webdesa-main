<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PerangkatArticleController extends Controller
{
    // Tampil semua artikel
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

        $articles = Article::orderBy('created_at', 'asc')->paginate(10);

        if ($user->role->id == 1) {
            return view('backend.admin.articles.index', compact('articles'));
        } else {
            return view('backend.perangkatdesa.articles.index', compact('articles'));
        }
    }

    // Form buat artikel baru
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
            return view('backend.admin.articles.create');
        } else {
            return view('backend.perangkatdesa.articles.create');
        }
    }

    // Simpan artikel baru
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
            'konten' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpg,png,jpeg,gif,webp|max:2048',
            'status' => 'required|in:draft,published',
        ]);

        $gambarPath = null;
        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('articles', 'public');
        }

        Article::create([
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul),
            'konten' => $request->konten,
            'gambar' => $gambarPath,
            'author_id' => session('user_id'), // PD ID
            'status' => $request->status,
        ]);

        if ($user->role->id == 1) {
            return redirect()->route('admin.article.index')
                ->with('success', 'Artikel berhasil ditambahkan.');
        } else {
            return redirect()->route('perangkat.article.index')
                ->with('success', 'Artikel berhasil ditambahkan.');
        }
    }

    // Form edit artikel
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

        $article = Article::findOrFail($id);

        if ($user->role->id == 1) {
            return view('backend.admin.articles.edit', compact('article'));
        } else {
            return view('backend.perangkatdesa.articles.edit', compact('article'));
        }
    }

    // Update artikel
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

        $article = Article::findOrFail($id);

        $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpg,png,jpeg,gif,webp|max:2048',
            'status' => 'required|in:draft,published',
        ]);

        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('articles', 'public');
            $article->gambar = $gambarPath;
        }

        $article->judul = $request->judul;
        $article->slug = Str::slug($request->judul);
        $article->konten = $request->konten;
        $article->status = $request->status;
        $article->save();

        if ($user->role->id == 1) {
            return redirect()->route('admin.article.index')
                ->with('success', 'Artikel berhasil diperbarui.');
        } else {
            return redirect()->route('perangkat.article.index')
                ->with('success', 'Artikel berhasil diperbarui.');
        }
    }

    // Hapus Artikel
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

        $article = Article::findOrFail($id);
        $article->delete();

        if ($user->role->id == 1) {
            return redirect()->route('admin.article.index')
                ->with('success', 'Artikel berhasil dihapus.');
        } else {
            return redirect()->route('perangkat.article.index')
                ->with('success', 'Artikel berhasil dihapus.');
        }
    }

}
