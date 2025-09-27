@extends('backend.index')

@section('page-title', 'Pengajuan Surat - Perangkat Desa')

@section('content')
    <div class="bg-white p-6 rounded shadow">
        <h2 class="text-xl font-bold mb-4">Daftar Pengajuan Surat Warga</h2>

        @if(session('success'))
            <div class="p-3 mb-4 bg-green-100 text-green-700 rounded">
                {{ session('success') }}
            </div>
        @endif

        <table class="w-full border border-gray-200 text-sm">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-2 border">#</th>
                    <th class="p-2 border">Nama Warga</th>
                    <th class="p-2 border">Template</th>
                    <th class="p-2 border">Status</th>
                    <th class="p-2 border">Diajukan</th>
                    <th class="p-2 border">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pengajuan as $item)
                    <tr>
                        <td class="p-2 border">{{ $loop->iteration }}</td>
                        <td class="p-2 border">{{ $item->nama_lengkap ?? '-' }}</td>
                        <td class="p-2 border">{{ $item->template->name ?? '-' }}</td>
                        <td class="p-2 border">
                            <span class="px-2 py-1 rounded text-white
                                                                            @if($item->status == 'pending') bg-yellow-500
                                                                            @elseif($item->status == 'diproses') bg-blue-500
                                                                            @elseif($item->status == 'selesai') bg-green-600
                                                                            @else bg-red-600 @endif">
                                {{ ucfirst($item->status) }}
                            </span>
                        </td>
                        <td class="p-2 border">{{ $item->created_at->timezone('Asia/Jakarta')->format('d/m/Y H:i') }}</td>
                        <td class="p-2 border space-x-2">
                            <a href="{{ route('pengajuan.perangkat.show', $item->id) }}"
                                class="px-3 py-1 bg-blue-500 text-white rounded">Detail</a>
                            <a href="{{ route('pengajuan.perangkat.cetak', $item->id) }}"
                                class="px-3 py-1 bg-green-500 text-white rounded" target="_blank">Cetak</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="p-3 text-center text-gray-500">Belum ada pengajuan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="mt-4">
            {{ $pengajuan->links() }}
        </div>
    </div>
@endsection
