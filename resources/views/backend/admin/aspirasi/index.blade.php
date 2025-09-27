@extends('backend.index')

@section('page-title', 'Daftar Aspirasi Warga (Admin)')

@section('content')
    <div class="p-6 bg-white shadow rounded-xl">
        <h2 class="text-xl font-bold mb-4">Daftar Aspirasi</h2>

        <table class="w-full border border-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-2 border">Judul</th>
                    <th class="p-2 border">Isi</th>
                    <th class="p-2 border">Status</th>
                    <th class="p-2 border">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($aspirasi as $item)
                    <tr>
                        <td class="p-2 border">{{ $item->judul }}</td>
                        <td class="p-2 border">{{ Str::limit($item->isi, 50) }}</td>
                        <td class="p-2 border">
                            <span class="px-2 py-1 rounded text-sm 
                                        @if($item->status == 'Menunggu') bg-yellow-200 text-yellow-800 
                                        @elseif($item->status == 'Diproses') bg-blue-200 text-blue-800 
                                        @elseif($item->status == 'Ditolak') bg-red-200 text-red-800 
                                        @else bg-green-200 text-green-800 @endif">
                                {{ $item->status }}
                            </span>
                        </td>
                        <td class="p-2 border text-center">
                            <a href="{{ route('admin.aspirasi.edit', $item->id) }}"
                                class="px-3 py-1 bg-blue-600 text-white rounded hover:bg-blue-700">
                                Review
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="p-4 text-center text-gray-500">Belum ada aspirasi</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="mt-4">
            {{ $aspirasi->links() }}
        </div>
    </div>
@endsection