@extends('backend.index')

@section('page-title', 'Kelola Anggota (Members)')

@section('content')
    <div class="p-6 bg-white rounded-xl shadow-md">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-700">Daftar Anggota</h2>
            <a href="{{ route('perangkat.members.create') }}"
                class="px-4 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700">
                + Tambah Anggota
            </a>
        </div>

        @if(session('success'))
            <div class="p-4 mb-6 text-green-800 bg-green-100 rounded-lg border border-green-300">
                {{ session('success') }}
            </div>
        @endif

        <table class="w-full border border-gray-200 rounded-lg shadow-sm">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-3 text-left">Nama</th>
                    <th class="p-3 text-left">NIK</th>
                    <th class="p-3 text-left">Jabatan</th>
                    <th class="p-3 text-left">Foto</th>
                    <th class="p-3 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($members as $member)
                    <tr class="border-t">
                        <td class="p-3">{{ $member->name }}</td>
                        <td class="p-3">{{ $member->nik ?? '-' }}</td>
                        <td class="p-3">{{ $member->position->name ?? '-' }}</td>
                        <td class="p-3">
                            @if($member->image)
                                <img src="{{ asset('storage/members/' . $member->image) }}"
                                    class="w-12 h-12 object-cover rounded-full">
                            @else
                                <span class="text-gray-400">Tidak ada</span>
                            @endif
                        </td>
                        <td class="p-3 text-center space-x-2">
                            <a href="{{ route('perangkat.members.edit', $member->id) }}"
                                class="px-3 py-1 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600">
                                Edit
                            </a>
                            <form action="{{ route('perangkat.members.destroy', $member->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Yakin ingin menghapus?')"
                                    class="px-3 py-1 bg-red-600 text-white rounded-lg hover:bg-red-700">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="p-4 text-center text-gray-500">Belum ada anggota.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="mt-6">
            {{ $members->links() }}
        </div>
    </div>
@endsection