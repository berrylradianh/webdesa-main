@extends('backend.index')

@section('page-title', 'Jam Operasional')

@section('content')
    <div class="max-w-4xl mx-auto bg-white p-6 rounded-xl shadow-md">
        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-700">Jam Operasional</h2>
            <a href="{{ route('perangkat.operationalhours.create') }}"
                class="px-4 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition">
                + Tambah
            </a>
        </div>

        <!-- Alert sukses -->
        @if(session('success'))
            <div class="mb-4 p-3 bg-green-100 border border-green-400 text-green-800 rounded">
                {{ session('success') }}
            </div>
        @endif

        <!-- Table -->
        <table class="w-full border border-gray-200 rounded-lg overflow-hidden">
            <thead class="bg-gray-100 text-gray-700">
                <tr>
                    <th class="p-3 border">Hari</th>
                    <th class="p-3 border">Jam Buka</th>
                    <th class="p-3 border">Jam Tutup</th>
                    <th class="p-3 border">Status</th>
                    <th class="p-3 border w-32">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($jamOperasional as $item)
                    <tr class="text-center border-t hover:bg-gray-50">
                        <!-- Hari -->
                        <td class="p-3 border font-medium text-gray-700">{{ $item->day }}</td>

                        <!-- Jam Buka -->
                        <td class="p-3 border">
                            {{ $item->is_closed ? '-' : ($item->open_time ?? '-') }}
                        </td>

                        <!-- Jam Tutup -->
                        <td class="p-3 border">
                            {{ $item->is_closed ? '-' : ($item->close_time ?? '-') }}
                        </td>

                        <!-- Status -->
                        <td class="p-3 border">
                            @if($item->is_closed)
                                <span class="px-2 py-1 bg-red-500 text-white rounded text-sm">Tutup</span>
                            @else
                                <span class="px-2 py-1 bg-green-500 text-white rounded text-sm">Buka</span>
                            @endif
                        </td>

                        <!-- Aksi -->
                        <td class="p-3 border space-x-1">
                            <a href="{{ route('perangkat.operationalhours.edit', $item->id) }}"
                                class="inline-block px-2 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600 text-sm">Edit</a>

                            <form action="{{ route('perangkat.operationalhours.destroy', $item->id) }}" method="POST"
                                class="inline">
                                @csrf @method('DELETE')
                                <button type="submit" onclick="return confirm('Yakin ingin hapus?')"
                                    class="px-2 py-1 bg-red-600 text-white rounded hover:bg-red-700 text-sm">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="p-4 text-center text-gray-500">Belum ada data jam operasional</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection