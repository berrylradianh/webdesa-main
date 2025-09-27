@extends('backend.index')

@section('page-title', 'Pengumuman Desa')

@section('content')
    <div class="p-6 bg-white rounded-xl shadow-md">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-700">Daftar Pengumuman Desa</h2>
            <a href="{{ route('perangkat.announcement.create') }}"
                class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-lg shadow">
                + Tambah Pengumuman
            </a>
        </div>

        @if(session('success'))
            <div class="p-4 mb-4 text-green-800 bg-green-100 rounded-lg shadow">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-sm">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 uppercase">Judul</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 uppercase">Tanggal</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 uppercase">Kategori</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 uppercase">Status</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 uppercase">Lampiran</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 uppercase">Link</th>
                        <th class="px-6 py-3 text-center text-sm font-medium text-gray-600 uppercase">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($announcements as $announcement)
                        <tr>
                            <td class="px-6 py-4 font-semibold">{{ $announcement->judul }}</td>
                            <td class="px-6 py-4 text-gray-500 text-sm">
                                {{ \Carbon\Carbon::parse($announcement->tanggal)->format('d M Y') }}
                            </td>
                            <td class="px-6 py-4">{{ $announcement->category->name ?? '-' }}</td>
                            <td class="px-6 py-4">
                                @if($announcement->status === 'published')
                                    <span class="px-2 py-1 rounded-full text-white bg-green-500 text-xs">Published</span>
                                @else
                                    <span class="px-2 py-1 rounded-full text-white bg-gray-500 text-xs">Draft</span>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                @if($announcement->lampiran)
                                    <a href="{{ asset('storage/' . $announcement->lampiran) }}" target="_blank"
                                        class="text-blue-600 underline">Lihat</a>
                                @else
                                    -
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                @if($announcement->link)
                                    <a href="{{ $announcement->link }}" target="_blank" class="text-blue-600 underline">Link</a>
                                @else
                                    -
                                @endif
                            </td>
                            <td class="px-6 py-4 text-center space-x-2">
                                <a href="{{ route('perangkat.announcement.edit', $announcement->id) }}"
                                    class="px-3 py-1 bg-yellow-400 hover:bg-yellow-500 text-white rounded-lg text-sm">Edit</a>
                                <form action="{{ route('perangkat.announcement.destroy', $announcement->id) }}" method="POST"
                                    class="inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="px-3 py-1 bg-red-500 hover:bg-red-600 text-white rounded-lg text-sm">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-4 text-center text-gray-500">Belum ada pengumuman desa.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-4">
            {{ $announcements->links() }}
        </div>
    </div>
@endsection