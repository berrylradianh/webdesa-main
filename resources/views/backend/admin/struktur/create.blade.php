@extends('backend.index')

@section('page-title', 'Tambah Jabatan')

@section('content')
    <div class="p-6 bg-white rounded-xl shadow-md max-w-2xl mx-auto">
        <h2 class="text-2xl font-bold mb-6 text-gray-700">Tambah Jabatan Baru</h2>

        <form action="{{ route('admin.positions.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="block font-semibold mb-1">Nama Jabatan</label>
                <input type="text" name="name" value="{{ old('name') }}"
                    class="w-full border rounded-lg px-3 py-2 focus:ring focus:ring-blue-200" required>
                @error('name') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="block font-semibold mb-1">Jenis</label>
                <select name="type" class="w-full border rounded-lg px-3 py-2 focus:ring focus:ring-blue-200" required>
                    <option value="">-- Pilih Jenis --</option>
                    <option value="pemerintah" {{ old('type') == 'pemerintah' ? 'selected' : '' }}>Pemerintah</option>
                    <option value="bpd" {{ old('type') == 'bpd' ? 'selected' : '' }}>BPD</option>
                    <option value="lembaga" {{ old('type') == 'lembaga' ? 'selected' : '' }}>Lembaga</option>
                </select>
                @error('type') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="block font-semibold mb-1">Parent (Atasan)</label>
                <select name="parent_id" class="w-full border rounded-lg px-3 py-2 focus:ring focus:ring-blue-200">
                    <option value="">-- Tidak ada --</option>
                    @foreach($parents as $parent)
                        <option value="{{ $parent->id }}" {{ old('parent_id') == $parent->id ? 'selected' : '' }}>
                            {{ $parent->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="flex justify-end space-x-3">
                <a href="{{ route('admin.positions.index') }}"
                    class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600">Batal</a>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Simpan</button>
            </div>
        </form>
    </div>
@endsection