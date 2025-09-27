@extends('backend.index')

@section('page-title', 'Tambah Role')

@section('content')
    <div class="max-w-2xl mx-auto bg-white p-8 rounded-2xl shadow-lg">
        <!-- Header -->
        <div class="flex items-center gap-3 mb-6 border-b pb-3">
            <i data-feather="user-plus" class="w-6 h-6 text-[#3EB489]"></i>
            <h2 class="text-2xl font-bold text-gray-800">Tambah Role</h2>
        </div>

        <!-- Error Message -->
        @if ($errors->any())
            <div class="mb-6 p-4 rounded-lg bg-red-50 border border-red-200 text-red-700">
                <ul class="list-disc list-inside text-sm">
                    @foreach ($errors->all() as $error)
                        <li class="leading-relaxed">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Form -->
        <form action="{{ route('roles.store') }}" method="POST" class="space-y-6">
            @csrf

            <!-- Input -->
            <div>
                <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">Nama Role</label>
                <input type="text" name="name" id="name"
                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-[#3EB489] focus:border-[#3EB489] transition"
                    placeholder="contoh: admin, perangkatdesa, warga" required>
            </div>

            <!-- Buttons -->
            <div class="flex justify-end gap-3 pt-4 border-t">
                <a href="{{ route('roles') }}"
                    class="px-5 py-2.5 rounded-lg bg-gray-200 text-gray-700 font-medium hover:bg-gray-300 transition">
                    Batal
                </a>
                <button type="submit"
                    class="px-5 py-2.5 rounded-lg bg-[#3EB489] text-white font-medium hover:bg-[#34a97a] transition">
                    Simpan
                </button>
            </div>
        </form>
    </div>
@endsection