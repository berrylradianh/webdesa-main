{{-- resources/views/perangkatdesa/dashboard.blade.php --}}
@extends('backend.index')

@section('page-title', 'Dashboard Perangkat Desa')

@section('content')
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
            <h2 class="text-lg font-bold text-gray-700 mb-2">Laporan Kegiatan</h2>
            <p class="text-3xl font-bold text-[#007BFF]">12</p>
        </div>
        <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
            <h2 class="text-lg font-bold text-gray-700 mb-2">Dokumentasi</h2>
            <p class="text-3xl font-bold text-[#3EB489]">34</p>
        </div>
        <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
            <h2 class="text-lg font-bold text-gray-700 mb-2">Pengumuman Desa</h2>
            <p class="text-3xl font-bold text-orange-500">5</p>
        </div>
    </div>
@endsection