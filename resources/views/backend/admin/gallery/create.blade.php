@extends('backend.index')

@section('page-title', 'Tambah Galeri')

@section('content')
    <div class="p-6 bg-white rounded-xl shadow-md max-w-4xl mx-auto">
        <h2 class="text-2xl font-bold mb-6 text-gray-700">Tambah Galeri</h2>

        @if($errors->any())
            <div class="mb-4 p-4 bg-red-100 text-red-700 rounded-lg">
                <ul class="list-disc pl-5">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label class="block font-medium text-gray-700">Judul</label>
                <input type="text" name="judul" value="{{ old('judul') }}" required
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:ring-blue-200">
            </div>

            <div class="mb-4 grid grid-cols-2 gap-4">
                <div>
                    <label class="block font-medium text-gray-700">Tanggal</label>
                    <input type="date" name="tanggal" value="{{ old('tanggal') ?? date('Y-m-d') }}" required
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:ring-blue-200">
                </div>
                <div>
                    <label class="block font-medium text-gray-700">Jam</label>
                    <input type="time" name="jam" value="{{ old('jam') ?? date('H:i') }}" required
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:ring-blue-200">
                </div>
            </div>

            <div class="mb-4">
                <label class="block font-medium text-gray-700">Foto / Video (boleh lebih dari 1)</label>
                <input type="file" name="items[]" multiple accept="image/*,video/*" class="w-full mt-2">
            </div>

            <button type="submit" class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-lg shadow">Simpan
                Galeri</button>
        </form>
    </div>
@endsection
