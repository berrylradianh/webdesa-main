@extends('backend.index')

@section('page-title', 'Tambah SOP')

@section('content')
    <div class="p-6 bg-white rounded-xl shadow-md max-w-xl mx-auto">
        <h2 class="text-2xl font-bold mb-6">Tambah SOP</h2>

        <form action="{{ route('sop.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block mb-1 font-medium">Judul</label>
                <input type="text" name="title" class="w-full border px-3 py-2 rounded" value="{{ old('title') }}">
                @error('title') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-medium">Deskripsi</label>
                <textarea name="description" class="w-full border px-3 py-2 rounded">{{ old('description') }}</textarea>
                @error('description') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>

            <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded">Simpan</button>
        </form>
    </div>
@endsection