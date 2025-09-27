@extends('backend.index')

@section('page-title', 'Kelola Struktur Organisasi Desa')

@section('content')
    <div class="p-6 bg-white rounded-xl shadow-md">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-700">Daftar Jabatan</h2>
            <a href="{{ route('admin.positions.create') }}"
                class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                + Tambah Jabatan
            </a>
        </div>

        @if(session('success'))
            <div class="p-4 mb-4 text-green-800 bg-green-100 border border-green-300 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-x-auto">
            <table class="w-full border border-gray-200 rounded-lg">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2 text-left">Nama Jabatan</th>
                        <th class="px-4 py-2 text-left">Jenis</th>
                        <th class="px-4 py-2 text-left">Parent</th>
                        <th class="px-4 py-2 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($positions as $position)
                        <tr class="border-t">
                            <td class="px-4 py-2">{{ $position->name }}</td>
                            <td class="px-4 py-2 capitalize">{{ $position->type }}</td>
                            <td class="px-4 py-2">
                                {{ $position->parent ? $position->parent->name : '-' }}
                            </td>
                            <td class="px-4 py-2 text-center space-x-2">
                                <a href="{{ route('admin.positions.edit', $position->id) }}"
                                    class="px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600">Edit</a>
                                <form action="{{ route('admin.positions.destroy', $position->id) }}" method="POST"
                                    class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Yakin ingin hapus data ini?')"
                                        class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-4 py-4 text-center text-gray-500">
                                Belum ada data jabatan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $positions->links() }}
        </div>
    </div>
@endsection