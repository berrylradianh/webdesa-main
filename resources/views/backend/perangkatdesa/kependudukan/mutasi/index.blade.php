@extends('backend.index')

@section('page-title', 'Data Mutasi Kependudukan')

@section('content')
    <div class="p-6 bg-white rounded-xl shadow-md">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Data Mutasi Kependudukan</h2>
            <a href="{{ route('perangkat.kependudukan.mutasi.create') }}"
                class="px-4 py-2 bg-green-600 text-white rounded-lg shadow hover:bg-green-700">
                + Tambah Mutasi
            </a>
        </div>

        @if (session('success'))
            <div class="p-4 mb-4 text-green-800 bg-green-100 rounded-lg border border-green-300">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-x-auto">
            <table class="w-full border border-gray-200 rounded-lg">
                <thead class="bg-gray-100">
                    <tr class="text-left">
                        <th class="px-4 py-2 border">Tahun</th>
                        <th class="px-4 py-2 border">Lahir</th>
                        <th class="px-4 py-2 border">Meninggal</th>
                        <th class="px-4 py-2 border">Pindah Keluar</th>
                        <th class="px-4 py-2 border">Pindah Masuk</th>
                        <th class="px-4 py-2 border">Status</th>
                        <th class="px-4 py-2 border text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($mutasi as $item)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-2 border">{{ $item->dataKependudukan->tahun ?? '-' }}</td>
                            <td class="px-4 py-2 border">{{ $item->lahir }}</td>
                            <td class="px-4 py-2 border">{{ $item->meninggal }}</td>
                            <td class="px-4 py-2 border">{{ $item->pindah_keluar }}</td>
                            <td class="px-4 py-2 border">{{ $item->pindah_masuk }}</td>
                            <td class="px-4 py-2 border">
                                <span
                                    class="px-2 py-1 text-sm rounded
                                                                                    {{ $item->status == 'approved' ? 'bg-green-100 text-green-700' : '' }}
                                                                                    {{ $item->status == 'pending' ? 'bg-yellow-100 text-yellow-700' : '' }}
                                                                                    {{ $item->status == 'rejected' ? 'bg-red-100 text-red-700' : '' }}">
                                    {{ ucfirst($item->status) }}
                                </span>
                            </td>
                            <td class="px-4 py-2 border text-center">
                                <div class="flex justify-center space-x-2">
                                    <a href="{{ route('perangkat.kependudukan.mutasi.edit', $item->id) }}"
                                        class="px-3 py-1 bg-blue-600 text-white text-sm rounded hover:bg-blue-700">
                                        Edit
                                    </a>
                                    <form action="{{ route('perangkat.kependudukan.mutasi.destroy', $item->id) }}" method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="px-3 py-1 bg-red-600 text-white text-sm rounded hover:bg-red-700">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-4 py-4 text-center text-gray-500">
                                Belum ada data mutasi kependudukan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection