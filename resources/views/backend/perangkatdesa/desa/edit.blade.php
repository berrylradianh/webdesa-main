@extends('backend.index')

@section('page-title', 'Edit Profil Desa')

@section('content')
    <div class="max-w-5xl mx-auto bg-white p-6 rounded-xl shadow-md">
        <h2 class="text-2xl font-bold text-gray-700 mb-6 border-b pb-2">Edit Profil Desa</h2>

        <form action="{{ route('perangkat.desa.update', $profile->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Nama Desa -->
            <div>
                <label class="block text-gray-700 font-semibold mb-2">Nama Desa</label>
                <input type="text" name="village_name" value="{{ old('village_name', $profile->village_name) }}"
                    class="w-full border-gray-300 rounded-lg shadow-sm">
            </div>

            <!-- Profil Desa -->
            <div>
                <label class="block text-gray-700 font-semibold mb-2">Profil Desa</label>
                <textarea name="profile" rows="4"
                    class="w-full border-gray-300 rounded-lg shadow-sm">{{ old('profile', $profile->profile) }}</textarea>
            </div>

            <!-- Sejarah Desa -->
            <div>
                <label class="block text-gray-700 font-semibold mb-2">Sejarah Desa</label>
                <textarea name="history" rows="6"
                    class="w-full border-gray-300 rounded-lg shadow-sm">{{ old('history', $profile->history) }}</textarea>
            </div>

            <!-- Tombol Aksi -->
            <div class="flex justify-end space-x-3">
                <a href="{{ route('perangkat.desa.index') }}"
                    class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600">Batal</a>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Update</button>
            </div>
        </form>
    </div>
@endsection