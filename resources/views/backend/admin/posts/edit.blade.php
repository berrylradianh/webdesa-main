@extends('backend.index')

@section('page-title', 'Edit Jadwal')

@section('content')
    <div class="p-6 bg-white rounded shadow">
        <h2 class="text-xl font-bold mb-4">Edit Jadwal</h2>

        <form action="{{ route('posts.update', $post->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="block font-semibold">Judul</label>
                <input type="text" name="title" class="w-full border p-2 rounded" value="{{ old('title', $post->title) }}"
                    required>
            </div>

            <div class="mb-3">
                <label class="block font-semibold">Deskripsi</label>
                <textarea name="description"
                    class="w-full border p-2 rounded">{{ old('description', $post->description) }}</textarea>
            </div>

            <div class="mb-3 grid grid-cols-2 gap-4">
                <div>
                    <label class="block font-semibold">Hari Mulai</label>
                    <select name="day_start" class="w-full border p-2 rounded">
                        <option value="">-- Pilih Hari --</option>
                        @foreach (['senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu', 'minggu'] as $day)
                            <option value="{{ $day }}" {{ old('day_start', $post->day_start) == $day ? 'selected' : '' }}>
                                {{ ucfirst($day) }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block font-semibold">Hari Selesai</label>
                    <select name="day_end" class="w-full border p-2 rounded">
                        <option value="">-- Pilih Hari --</option>
                        @foreach (['senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu', 'minggu'] as $day)
                            <option value="{{ $day }}" {{ old('day_end', $post->day_end) == $day ? 'selected' : '' }}>
                                {{ ucfirst($day) }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="mb-3 grid grid-cols-2 gap-4">
                <div>
                    <label class="block font-semibold">Pukul Mulai</label>
                    <input type="time" name="time_start" class="w-full border p-2 rounded"
                        value="{{ old('time_start', $post->time_start) }}">
                </div>
                <div>
                    <label class="block font-semibold">Pukul Selesai</label>
                    <input type="time" name="time_end" class="w-full border p-2 rounded"
                        value="{{ old('time_end', $post->time_end) }}">
                </div>
            </div>

            <div class="mb-3">
                <label class="block font-semibold">Zona Waktu</label>
                <select name="timezone" class="w-full border p-2 rounded">
                    @foreach(['WIB', 'WITA', 'WIT'] as $tz)
                        <option value="{{ $tz }}" {{ old('timezone', $post->timezone) == $tz ? 'selected' : '' }}>{{ $tz }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="block font-semibold">Status</label>
                <select name="open_status" class="w-full border p-2 rounded">
                    @foreach(['buka', 'tutup'] as $status)
                        <option value="{{ $status }}" {{ old('open_status', $post->open_status) == $status ? 'selected' : '' }}>
                            {{ ucfirst($status) }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded">Simpan</button>
            <a href="{{ route('posts.index') }}" class="px-4 py-2 bg-gray-400 text-white rounded">Kembali</a>
        </form>
    </div>
@endsection