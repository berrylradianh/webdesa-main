@extends('backend.index')

@section('page-title', 'Tambah Profil Desa')

@section('content')
    <div class="max-w-4xl mx-auto bg-white p-6 rounded-xl shadow-md">
        <h2 class="text-2xl font-bold text-gray-700 mb-6 border-b pb-2">Tambah Profil Desa</h2>

        <form action="{{ route('perangkat.desa.store') }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label class="block font-semibold mb-2">Nama Desa</label>
                <input type="text" name="village_name" value="{{ old('village_name') }}"
                    class="w-full border-gray-300 rounded-lg shadow-sm">
            </div>

            <div>
                <label class="block font-semibold mb-2">Profil Desa</label>
                <textarea name="profile" rows="4"
                    class="w-full border-gray-300 rounded-lg shadow-sm">{{ old('profile') }}</textarea>
            </div>

            <div>
                <label class="block font-semibold mb-2">Sejarah Desa</label>
                <textarea name="history" rows="4"
                    class="w-full border-gray-300 rounded-lg shadow-sm">{{ old('history') }}</textarea>
            </div>

            <div class="flex justify-end space-x-3">
                <a href="{{ route('perangkat.desa.index') }}"
                    class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600">Batal</a>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Simpan</button>
            </div>
        </form>
    </div>
@endsection
