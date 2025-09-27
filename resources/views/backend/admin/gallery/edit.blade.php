@extends('backend.index')

@section('page-title', 'Edit Galeri')

@section('content')
    <div class="p-6 bg-white rounded-xl shadow-md max-w-5xl mx-auto">
        <h2 class="text-2xl font-bold mb-6 text-gray-700">Edit Galeri</h2>

        {{-- Validasi error --}}
        @if($errors->any())
            <div class="mb-4 p-4 bg-red-100 text-red-700 rounded-lg">
                <ul class="list-disc pl-5">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Pesan sukses dari session --}}
        @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('admin.gallery.update', $gallery->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- Judul --}}
            <div class="mb-4">
                <label class="block font-medium text-gray-700">Judul</label>
                <input type="text" name="judul" value="{{ old('judul', $gallery->judul) }}" required
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:ring-blue-200">
            </div>

            {{-- Tanggal & Jam --}}
            <div class="mb-4 grid grid-cols-2 gap-4">
                <div>
                    <label class="block font-medium text-gray-700">Tanggal</label>
                    <input type="date" name="tanggal"
                        value="{{ old('tanggal', \Carbon\Carbon::parse($gallery->tanggal)->format('Y-m-d')) }}" required
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:ring-blue-200">
                </div>
                <div>
                    <label class="block font-medium text-gray-700">Jam</label>
                    <input type="time" name="jam" value="{{ old('jam', $gallery->jam) }}" required
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:ring-blue-200">
                </div>
            </div>

            {{-- Upload media baru --}}
            <div class="mb-6">
                <label class="block font-medium text-gray-700">Tambahkan Foto / Video Baru</label>
                <input type="file" name="items[]" multiple accept="image/*,video/*"
                    class="w-full mt-2 border p-2 rounded-lg">
            </div>

            {{-- Preview media lama --}}
            @if($gallery->items->count())
                <p class="mb-2 font-medium text-gray-700">Media yang sudah ada:</p>
                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4 mb-6 max-h-96 overflow-y-auto">
                    @foreach($gallery->items as $item)
                        @php
                            $ext = pathinfo($item->file, PATHINFO_EXTENSION);
                            $isVideo = in_array(strtolower($ext), ['mp4', 'mov', 'avi', 'webm']);
                            $mediaUrl = $item->file ? asset('storage/' . $item->file) : null;
                        @endphp
                        <div class="relative rounded-lg overflow-hidden shadow group">
                            @if($mediaUrl)
                                @if($isVideo)
                                    <video src="{{ $mediaUrl }}" class="w-full h-32 object-cover rounded-lg" controls></video>
                                @else
                                    <img src="{{ $mediaUrl }}" class="w-full h-32 object-cover rounded-lg">
                                @endif
                            @else
                                <div class="w-full h-32 bg-gray-200 flex items-center justify-center text-gray-500 text-xs">
                                    File hilang
                                </div>
                            @endif

                            {{-- Form hapus --}}
                            <form action="{{ route('admin.gallery.item.destroy', $item->id) }}"
                                method="POST" class="absolute top-2 right-2">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="bg-red-500 hover:bg-red-600 text-white w-6 h-6 rounded-full flex items-center justify-center text-lg opacity-0 group-hover:opacity-100 transition-opacity z-10"
                                    onclick="return confirm('Yakin ingin menghapus media ini?')">
                                    &times;
                                </button>
                            </form>
                        </div>
                    @endforeach
                </div>
            @endif

            {{-- Tombol Update dan Kembali --}}
            <div class="flex justify-end space-x-4">
                <a href="{{ route('admin.gallery.index') }}"
                    class="px-6 py-2 bg-gray-500 hover:bg-gray-600 text-white rounded-lg shadow">
                    Kembali
                </a>
                <button type="submit" class="px-6 py-2 bg-green-500 hover:bg-green-600 text-white rounded-lg shadow">
                    Update Galeri
                </button>
            </div>
        </form>
    </div>
@endsection
