@extends('backend.index')

@section('page-title', 'Edit Pengumuman Desa')

@section('content')
    <div class="max-w-4xl mx-auto p-6 bg-white rounded-xl shadow-md">
        <h2 class="text-3xl font-bold mb-6 text-gray-800">Edit Pengumuman Desa</h2>

        <form action="{{ route('admin.announcement.update', $announcement->id) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 gap-4">
                <!-- Judul -->
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Judul</label>
                    <input type="text" name="judul" value="{{ old('judul', $announcement->judul) }}"
                        class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-200 p-3" required>
                </div>

                <!-- Isi -->
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Isi Pengumuman</label>
                    <textarea name="isi" rows="5"
                        class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-200 p-3"
                        required>{{ old('isi', $announcement->isi) }}</textarea>
                </div>

                <!-- Tanggal -->
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Tanggal</label>
                    <input type="date" name="tanggal"
                        class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-200 p-3"
                        value="{{ old('tanggal', $announcement->tanggal) }}">
                </div>

                <!-- Kategori -->
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Kategori</label>
                    <select name="category_id"
                        class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-200 p-3" required>
                        <option value="">-- Pilih Kategori --</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $announcement->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Status -->
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Status</label>
                    <select name="status"
                        class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-200 p-3" required>
                        <option value="draft" {{ $announcement->status == 'draft' ? 'selected' : '' }}>Draft</option>
                        <option value="published" {{ $announcement->status == 'published' ? 'selected' : '' }}>Published
                        </option>
                    </select>
                </div>

                <!-- Lampiran -->
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Lampiran (File)</label>
                    <input type="file" name="lampiran" class="w-full text-gray-600">
                    @if($announcement->lampiran)
                        <p class="text-sm mt-1">File saat ini: <a href="{{ asset('storage/' . $announcement->lampiran) }}"
                                target="_blank" class="text-blue-600 underline">Lihat</a></p>
                    @endif
                    <p class="text-sm text-gray-500 mt-1">Format file: pdf, jpg, png, doc, docx (opsional)</p>
                </div>

                <!-- Link URL -->
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Link URL</label>
                    <input type="url" name="link" value="{{ old('link', $announcement->link) }}"
                        class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-200 p-3"
                        placeholder="https://contoh.com">
                </div>
            </div>

            <!-- Buttons -->
            <div class="flex justify-end mt-6 space-x-3">
                <a href="{{ route('admin.announcement.index') }}"
                    class="px-5 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600">Batal</a>
                <button type="submit" class="px-5 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Update</button>
            </div>
        </form>
    </div>
@endsection
