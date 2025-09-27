@extends('backend.index')

@section('page-title', 'Tambah Data Kependudukan')

@section('content')
    <div class="p-6 bg-white rounded-xl shadow-md max-w-3xl mx-auto">
        <h2 class="text-2xl font-bold mb-6 text-gray-800">Tambah Data Kependudukan</h2>

        <form action="{{ route('perangkat.kependudukan.store') }}" method="POST" class="space-y-5">
            @csrf

            <div>
                <label class="block font-semibold mb-1">Tahun</label>
                <input type="number" name="tahun" value="{{ date('Y') }}" min="2000" max="{{ date('Y') + 1 }}"
                    class="w-full border rounded px-3 py-2" required>
                <p class="text-xs text-gray-500 mt-1">Masukkan tahun data kependudukan</p>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block font-semibold mb-1">Jumlah Penduduk</label>
                    <input type="number" name="jumlah_penduduk" class="w-full border rounded px-3 py-2" required>
                </div>
                <div>
                    <label class="block font-semibold mb-1">Jumlah KK</label>
                    <input type="number" name="jumlah_kk" class="w-full border rounded px-3 py-2" required>
                </div>
                <div>
                    <label class="block font-semibold mb-1">Jumlah Laki-laki</label>
                    <input type="number" name="jumlah_laki" class="w-full border rounded px-3 py-2" required>
                </div>
                <div>
                    <label class="block font-semibold mb-1">Jumlah Perempuan</label>
                    <input type="number" name="jumlah_perempuan" class="w-full border rounded px-3 py-2" required>
                </div>
            </div>

            <div class="flex justify-end space-x-2">
                <a href="{{ route('perangkat.kependudukan.index') }}"
                    class="px-4 py-2 bg-gray-500 text-white rounded-lg shadow hover:bg-gray-600">
                    Batal
                </a>
                <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-lg shadow hover:bg-green-700">
                    Simpan
                </button>
            </div>
        </form>
    </div>
@endsection