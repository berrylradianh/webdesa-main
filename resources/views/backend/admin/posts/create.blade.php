@extends('backend.index')

@section('page-title', 'Tambah Artikel')

@section('content')
    <div class="p-6 bg-white rounded shadow">
        <h2 class="text-xl font-bold mb-4">Tambah Artikel</h2>

        <form action="{{ route('posts.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="block font-semibold">Judul</label>
                <input type="text" name="title" class="w-full border p-2 rounded" value="{{ old('title') }}" required>
            </div>

            <div class="mb-3">
                <label class="block font-semibold">Deskripsi</label>
                <textarea name="description" class="w-full border p-2 rounded">{{ old('description') }}</textarea>
            </div>

            <div class="mb-3 grid grid-cols-2 gap-4">
                <div>
                    <label class="block font-semibold">Hari Mulai</label>
                    <select name="day_start" class="w-full border p-2 rounded">
                        @foreach (['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'] as $day)
                            <option value="{{ $day }}">{{ $day }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block font-semibold">Hari Selesai</label>
                    <select name="day_end" class="w-full border p-2 rounded">
                        @foreach (['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'] as $day)
                            <option value="{{ $day }}">{{ $day }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="mb-3 grid grid-cols-2 gap-4">
                <div>
                    <label class="block font-semibold">Pukul Mulai</label>
                    <input type="time" name="time_start" class="w-full border p-2 rounded">
                </div>
                <div>
                    <label class="block font-semibold">Pukul Selesai</label>
                    <input type="time" name="time_end" class="w-full border p-2 rounded">
                </div>
            </div>

            <div class="mb-3">
                <label class="block font-semibold">Zona Waktu</label>
                <select name="timezone" class="w-full border p-2 rounded">
                    <option value="WIB">WIB</option>
                    <option value="WITA">WITA</option>
                    <option value="WIT">WIT</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="block font-semibold">Status</label>
                <select name="open_status" class="w-full border p-2 rounded">
                    <option value="buka">Beroprasi</option>
                    <option value="tutup">Tidak Beroprasi</option>
                </select>
            </div>

            <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded">Simpan</button>
            <a href="{{ route('posts.index') }}" class="px-4 py-2 bg-gray-400 text-white rounded">Kembali</a>
        </form>
    </div>
@endsection