@extends('backend.index')
@section('page-title', 'Admin-Dashboard')

@section('content')
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Card -->
        <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
            <h2 class="text-lg font-bold text-gray-700 mb-2">Artikel</h2>
            <p class="text-3xl font-bold text-[#007BFF]">120</p>
        </div>
        <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
            <h2 class="text-lg font-bold text-gray-700 mb-2">Kategori</h2>
            <p class="text-3xl font-bold text-[#3EB489]">15</p>
        </div>
        <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
            <h2 class="text-lg font-bold text-gray-700 mb-2">Media</h2>
            <p class="text-3xl font-bold text-[#FF9800]">80</p>
        </div>
    </div>
@endsection