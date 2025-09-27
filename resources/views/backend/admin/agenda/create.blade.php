@extends('backend.index')

@section('page-title', 'Buat Agenda Kegiatan')

@section('content')
    <div class="p-6 bg-white rounded-xl shadow-md max-w-3xl mx-auto">
        <h2 class="text-2xl font-bold mb-6">Buat Agenda Baru</h2>

        <form action="{{ route('admin.agenda.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block mb-2 font-semibold">Judul</label>
                <input type="text" name="judul" value="{{ old('judul') }}" class="w-full px-4 py-2 border rounded-lg"
                    required>
            </div>

            <div class="mb-4">
                <label class="block mb-2 font-semibold">Deskripsi</label>
                <textarea name="deskripsi" class="w-full px-4 py-2 border rounded-lg">{{ old('deskripsi') }}</textarea>
            </div>

            <div class="grid grid-cols-2 gap-4 mb-4">
                <div>
                    <label class="block mb-2 font-semibold">Tanggal Mulai</label>
                    <input type="date" name="tanggal_mulai" value="{{ old('tanggal_mulai') }}"
                        class="w-full px-4 py-2 border rounded-lg" required>
                </div>
                <div>
                    <label class="block mb-2 font-semibold">Tanggal Selesai</label>
                    <input type="date" name="tanggal_selesai" value="{{ old('tanggal_selesai') }}"
                        class="w-full px-4 py-2 border rounded-lg">
                </div>
            </div>

            <div class="mb-4">
                <label class="block mb-2 font-semibold">Lokasi</label>
                <input type="text" name="lokasi" value="{{ old('lokasi') }}" class="w-full px-4 py-2 border rounded-lg">
            </div>

            <div class="mb-4">
                <label class="block mb-2 font-semibold">Status</label>
                <select name="status" class="w-full px-4 py-2 border rounded-lg">
                    <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                    <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>Published</option>
                </select>
            </div>

            <button type="submit" class="px-6 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-lg">Simpan</button>
        </form>
    </div>
@endsection
