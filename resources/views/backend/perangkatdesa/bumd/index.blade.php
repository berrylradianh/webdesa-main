@extends('backend.index')

@section('page-title', 'Badan Usaha Milik Desa')

@section('content')
    <div class="max-w-5xl mx-auto bg-white p-8 rounded-2xl shadow-md">
        <!-- Header -->
        <div class="flex justify-between items-center border-b border-gray-200 pb-4 mb-6">
            <h2 class="text-2xl font-bold text-gray-700">Badan Usaha Milik Desa</h2>
            <a href="{{ route('perangkat.bumd.create') }}"
                class="flex items-center gap-2 px-4 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition">
                Tambah BUMD
            </a>
        </div>

        <!-- Notifikasi -->
        @if(session('success'))
            <div class="mb-6 p-4 text-green-800 bg-green-100 rounded-lg border border-green-300">
                {{ session('success') }}
            </div>
        @endif

        <!-- Isi Konten -->
        @if($profiles->isEmpty())
            <div class="text-center py-12 text-gray-500">
                <p class="mb-4">Belum ada data BUMD.</p>
            </div>
        @else
            <div class="space-y-6">
                @foreach($profiles as $profile)
                    <div class="p-4 bg-gray-50 rounded-lg border">
                        <div class="flex justify-between items-center mb-2">
                            <h3 class="text-lg font-semibold text-gray-700">{{ $profile->name }}</h3>
                            <div class="flex space-x-2">
                                <a href="{{ route('perangkat.bumd.edit', $profile->id) }}"
                                    class="px-3 py-1 bg-yellow-500 text-white rounded-lg shadow hover:bg-yellow-600">Edit</a>
                                <form action="{{ route('perangkat.bumd.destroy', $profile->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-3 py-1 bg-red-500 text-white rounded-lg shadow hover:bg-red-600"
                                        onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                                </form>
                            </div>
                        </div>
                        <p class="text-gray-600"><strong>Jenis Usaha:</strong> {{ $profile->type }}</p>
                        <p class="text-gray-600"><strong>Alamat:</strong> {{ $profile->address ?? '-' }}</p>
                        <p class="text-gray-600"><strong>Kontak:</strong> {{ $profile->contact ?? '-' }}</p>
                        <p class="text-gray-600"><strong>Tanggal Pendirian:</strong> {{ $profile->establishment_date ? $profile->establishment_date->format('d-m-Y') : '-' }}</p>
                        <p class="text-gray-600"><strong>Deskripsi:</strong> {!! nl2br(e($profile->description)) ?? '-' !!}</p>
                        <p class="text-gray-600"><strong>Modal:</strong> {{ $profile->capital ? 'Rp ' . number_format($profile->capital, 2, ',', '.') : '-' }}</p>
                        <p class="text-gray-600"><strong>Status:</strong> {{ $profile->status == 'active' ? 'Aktif' : 'Tidak Aktif' }}</p>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
