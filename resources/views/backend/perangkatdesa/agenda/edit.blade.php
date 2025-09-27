@extends('backend.index')

@section('page-title', 'Edit Agenda')

@section('content')
    <div class="p-6 bg-white rounded-xl shadow-md max-w-3xl mx-auto">
        <h2 class="text-2xl font-bold mb-6">Edit Agenda</h2>

        <form action="{{ route('perangkat.agenda.update', $agenda->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block mb-1 font-semibold">Judul</label>
                <input type="text" name="judul" class="w-full border px-3 py-2 rounded"
                    value="{{ old('judul', $agenda->judul) }}" required>
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-semibold">Deskripsi</label>
                <textarea name="deskripsi" class="w-full border px-3 py-2 rounded"
                    rows="4">{{ old('deskripsi', $agenda->deskripsi) }}</textarea>
            </div>

            <div class="grid grid-cols-2 gap-4 mb-4">
                <div>
                    <label class="block mb-1 font-semibold">Tanggal Mulai</label>
                    <input type="date" name="tanggal_mulai" class="w-full border px-3 py-2 rounded"
                        value="{{ old('tanggal_mulai', $agenda->tanggal_mulai->format('Y-m-d')) }}" required>
                </div>
                <div>
                    <label class="block mb-1 font-semibold">Tanggal Selesai</label>
                    <input type="date" name="tanggal_selesai" class="w-full border px-3 py-2 rounded"
                        value="{{ old('tanggal_selesai', $agenda->tanggal_selesai?->format('Y-m-d')) }}">
                </div>
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-semibold">Lokasi</label>
                <input type="text" name="lokasi" class="w-full border px-3 py-2 rounded"
                    value="{{ old('lokasi', $agenda->lokasi) }}">
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-semibold">Status</label>
                <select name="status" class="w-full border px-3 py-2 rounded">
                    <option value="draft" {{ old('status', $agenda->status) == 'draft' ? 'selected' : '' }}>Draft</option>
                    <option value="published" {{ old('status', $agenda->status) == 'published' ? 'selected' : '' }}>Published
                    </option>
                </select>
            </div>

            <div>
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Update</button>
                <a href="{{ route('perangkat.agenda.index') }}"
                    class="px-4 py-2 bg-gray-400 text-white rounded hover:bg-gray-500">Batal</a>
            </div>
        </form>
    </div>
@endsection