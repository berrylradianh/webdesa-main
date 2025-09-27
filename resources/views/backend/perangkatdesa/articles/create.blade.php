@extends('backend.index')

@section('page-title', 'Buat Artikel Baru')

@section('content')
    <div class="p-6 bg-white rounded-xl shadow-md max-w-3xl mx-auto">
        <h2 class="text-2xl font-bold mb-4">Buat Artikel Baru</h2>

        <form action="{{ route('perangkat.article.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label class="block mb-1 font-semibold">Judul</label>
                <input type="text" name="judul" class="w-full border p-2 rounded" value="{{ old('judul') }}">
                @error('judul') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-semibold">Konten</label>
                <textarea name="konten" class="w-full border p-2 rounded" rows="6">{{ old('konten') }}</textarea>
                @error('konten') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-semibold">Gambar (opsional)</label>
                <input type="file" name="gambar">
                @error('gambar') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-semibold">Status</label>
                <select name="status" class="w-full border p-2 rounded">
                    <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                    <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>Published</option>
                </select>
                @error('status') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">Simpan</button>
        </form>
    </div>
@endsection