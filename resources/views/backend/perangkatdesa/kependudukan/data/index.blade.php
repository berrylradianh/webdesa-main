@extends('backend.index')

@section('page-title', 'Data Kependudukan')

@section('content')
    <div class="p-6 bg-white rounded-xl shadow-md">
        <h2 class="text-2xl font-bold mb-6 text-gray-800">Data Kependudukan</h2>

        {{-- Tombol Create jika belum ada data --}}
        @if($dataKependudukan->isEmpty())
            <div class="text-center py-10">
                <p class="mb-4 text-gray-600">Belum ada data kependudukan. Silakan buat data baru.</p>
                <a href="{{ route('perangkat.kependudukan.create') }}"
                    class="px-5 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700">
                    + Buat Data
                </a>
            </div>
        @else
            <div class="overflow-x-auto mb-4">
                <a href="{{ route('perangkat.kependudukan.create') }}"
                    class="px-5 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700">
                    + Buat Data
                </a>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full border-collapse border border-gray-200">
                    <thead class="bg-gray-100">
                        <tr class="text-left text-sm font-semibold text-gray-700">
                            <th class="border p-3">Tahun</th>
                            <th class="border p-3">Penduduk</th>
                            <th class="border p-3">KK</th>
                            <th class="border p-3">Laki-laki</th>
                            <th class="border p-3">Perempuan</th>
                            <th class="border p-3">Status</th>
                            <th class="border p-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($dataKependudukan as $item)
                            <tr class="text-sm text-gray-700 hover:bg-gray-50">
                                <td class="border p-3">{{ $item->tahun }}</td>
                                <td class="border p-3">{{ $item->jumlah_penduduk }}</td>
                                <td class="border p-3">{{ $item->jumlah_kk }}</td>
                                <td class="border p-3">{{ $item->jumlah_laki }}</td>
                                <td class="border p-3">{{ $item->jumlah_perempuan }}</td>
                                <td class="border p-3">
                                    <span
                                        class="px-2 py-1 rounded-lg text-xs
                                                                                                                                    @if($item->status == 'approved') bg-green-100 text-green-700
                                                                                                                                    @elseif($item->status == 'rejected') bg-red-100 text-red-700
                                                                                                                                    @else bg-yellow-100 text-yellow-700 @endif">
                                        {{ ucfirst($item->status) }}
                                    </span>
                                </td>
                                <td class="border p-3">
                                    <div class="flex space-x-2">
                                        <a href="{{ route('perangkat.kependudukan.edit', $item->id) }}"
                                            class="px-3 py-1 bg-indigo-500 text-white text-xs rounded-lg hover:bg-indigo-600">
                                            Edit
                                        </a>
                                        <form action="{{ route('perangkat.kependudukan.destroy', $item->id) }}" method="POST"
                                            onsubmit="return confirm('Yakin hapus data ini?')">
                                            @csrf @method('DELETE')
                                            <button class="px-3 py-1 bg-red-500 text-white text-xs rounded-lg hover:bg-red-600">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                    @if($item->catatan_admin)
                                        <p class="mt-1 text-xs text-gray-500 italic">Catatan: {{ $item->catatan_admin }}</p>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection