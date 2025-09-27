@extends('backend.index')

@section('page-title', 'Edit Anggota')

@section('content')
    <div class="max-w-4xl mx-auto bg-white p-8 rounded-xl shadow-md">
        <h2 class="text-2xl font-bold mb-6 text-gray-700 border-b border-gray-200 pb-2">Edit Anggota</h2>

        @if(session('success'))
            <div class="p-4 mb-6 bg-green-50 border border-green-200 rounded-lg">
                <p class="text-green-800 text-sm">{{ session('success') }}</p>
            </div>
        @endif

        <form action="{{ route('perangkat.members.update', $member->id) }}" method="POST" enctype="multipart/form-data"
            class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label class="block font-semibold mb-2 text-gray-700">Nama</label>
                <input type="text" name="name" value="{{ old('name', $member->name) }}"
                    class="w-full border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150"
                    required>
                @error('name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block font-semibold mb-2 text-gray-700">NIK</label>
                <input type="text" name="nik" value="{{ old('nik', $member->nik) }}"
                    class="w-full border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150">
                @error('nik')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block font-semibold mb-2 text-gray-700">Jabatan</label>
                <select name="position_id"
                    class="w-full border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150"
                    required>
                    <option value="">-- Pilih Jabatan --</option>
                    @foreach($positions as $position)
                        <option value="{{ $position->id }}" {{ old('position_id', $member->position_id) == $position->id ? 'selected' : '' }}>
                            {{ $position->name }}
                        </option>
                    @endforeach
                </select>
                @error('position_id')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block font-semibold mb-2 text-gray-700">Foto Profil</label>
                @if($member->image)
                    <div class="mb-3">
                        <img src="{{ asset('storage/members/' . $member->image) }}" alt="Foto Profil Saat Ini"
                            class="w-24 h-24 object-cover rounded-full border border-gray-300">
                        <p class="text-xs text-gray-500 mt-1">Gambar saat ini. Upload baru untuk mengganti.</p>
                    </div>
                @endif
                <input type="file" name="image" accept="image/*"
                    class="w-full border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                @error('image')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end space-x-3">
                <a href="{{ route('perangkat.members.index') }}"
                    class="px-6 py-2 bg-gray-200 text-gray-700 rounded-lg shadow-sm hover:bg-gray-300 transition duration-150">
                    Batal
                </a>
                <button type="submit"
                    class="px-6 py-2 bg-blue-600 text-white font-semibold rounded-lg shadow-sm hover:bg-blue-700 transition duration-150">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
@endsection