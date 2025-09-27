@extends('backend.index')

@section('page-title', 'Profil Desa')

@section('content')
<div class="max-w-5xl mx-auto bg-white p-8 rounded-2xl shadow-md">
    <!-- Header -->
    <div class="flex justify-between items-center border-b border-gray-200 pb-4 mb-6">
        <h2 class="text-2xl font-bold text-gray-700">Profil Desa</h2>
    </div>

    <!-- Notifikasi -->
    @if(session('success'))
    <div class="mb-6 p-4 text-green-800 bg-green-100 rounded-lg border border-green-300">
        {{ session('success') }}
    </div>
    @endif

    <!-- Isi Konten -->
    @if($profiles->isNotEmpty())
    <div class="space-y-6">
        @foreach($profiles as $profile)
        <div class="p-4 bg-gray-50 rounded-lg border">
            <!-- Nama Desa -->
            <div class="mb-4">
                <h3 class="text-lg font-semibold text-gray-700 mb-1">Nama Desa</h3>
                <p class="text-gray-600">{{ $profile->village_name }}</p>
            </div>

            <!-- Profil Desa -->
            <div class="mb-4">
                <h3 class="text-lg font-semibold text-gray-700 mb-1">Profil Desa</h3>
                <p class="text-gray-600 leading-relaxed">{!! nl2br(e($profile->profile)) !!}</p>
            </div>

            <!-- Sejarah Desa -->
            <div class="mb-4">
                <h3 class="text-lg font-semibold text-gray-700 mb-1">Sejarah Desa</h3>
                <p class="text-gray-600 leading-relaxed">{!! nl2br(e($profile->history)) !!}</p>
            </div>

            <!-- Edit Button -->
            <div class="text-right">
                <a href="{{ route('perangkat.desa.edit', $profile->id) }}"
                    class="inline-flex items-center gap-2 px-4 py-2 bg-yellow-500 text-white rounded-lg shadow hover:bg-yellow-600 transition">
                    Edit
                </a>
            </div>
        </div>
        @endforeach
    </div>
    @else
    <div class="text-center py-12 text-gray-500">
        <p class="mb-4">Belum ada data profil desa.</p>
        <a href="{{ route('perangkat.desa.create') }}"
            class="inline-flex items-center gap-2 px-5 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition">
            Tambah Profil
        </a>
    </div>
    @endif
</div>
@endsection
