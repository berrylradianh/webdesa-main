@extends('backend.index')

@section('page-title', 'Manajemen Aspirasi Warga (Perangkat Desa)')

@section('content')
    <div class="p-6 bg-white shadow rounded-xl">
        <h2 class="text-xl font-bold mb-4">Daftar Aspirasi Warga</h2>

        <table class="w-full border-collapse border border-gray-200">
            <thead>
                <tr class="bg-gray-100 text-left">
                    <th class="p-3 border">No</th>
                    <th class="p-3 border">Judul</th>
                    <th class="p-3 border">Isi</th>
                    <th class="p-3 border">Status</th>
                    <th class="p-3 border">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($aspirasi as $i => $a)
                    <tr class="hover:bg-gray-50">
                        <td class="p-3 border">{{ $i + 1 }}</td>
                        <td class="p-3 border">{{ $a->judul }}</td>
                        <td class="p-3 border">{{ Str::limit($a->isi, 50) }}</td>
                        <td class="p-3 border">
                            <span class="px-2 py-1 rounded text-sm
                                    @if($a->status == 'Menunggu') bg-yellow-100 text-yellow-700
                                    @elseif($a->status == 'Diproses') bg-blue-100 text-blue-700
                                    @elseif($a->status == 'Ditolak') bg-red-100 text-red-700
                                    @else bg-green-100 text-green-700 @endif">
                                {{ $a->status }}
                            </span>
                        </td>
                        <td class="p-3 border">
                            <a href="{{ route('perangkat.aspirasi.edit', $a->id) }}"
                                class="px-3 py-1 bg-blue-600 text-white rounded text-sm">
                                Edit
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="p-3 text-center text-gray-500">Belum ada aspirasi</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="mt-6">
            {{ $aspirasi->links() }}
        </div>
    </div>
@endsection