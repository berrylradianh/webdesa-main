@extends('backend.index')

@section('page-title', 'Edit Artikel')

@section('content')
    <div class="p-6 bg-white rounded-xl shadow-md max-w-3xl mx-auto">
        <h2 class="text-2xl font-bold mb-4">Edit Artikel</h2>

        <form action="{{ route('admin.article.update', $article->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block mb-1 font-semibold">Judul</label>
                <input type="text" name="judul" class="w-full border p-2 rounded"
                    value="{{ old('judul', $article->judul) }}">
                @error('judul') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-semibold">Konten</label>
                <textarea name="konten" class="w-full border p-2 rounded"
                    rows="6">{{ old('konten', $article->konten) }}</textarea>
                @error('konten') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-semibold">Gambar</label>
                @if($article->gambar)
                    <img src="{{ asset('storage/' . $article->gambar) }}" alt="Gambar Artikel" class="w-32 mb-2">
                @endif
                <input type="file" name="gambar">
                @error('gambar') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-semibold">Status</label>
                <select name="status" class="w-full border p-2 rounded">
                    <option value="draft" {{ old('status', $article->status) == 'draft' ? 'selected' : '' }}>Draft</option>
                    <option value="published" {{ old('status', $article->status) == 'published' ? 'selected' : '' }}>Published
                    </option>
                </select>
                @error('status') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">Update</button>
        </form>
    </div>
@endsection
