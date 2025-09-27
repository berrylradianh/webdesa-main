@extends('backend.index')

@section('page-title', 'Profil Perangkat Desa')

@section('content')
    <div class="max-w-6xl mx-auto bg-white p-6 rounded-xl shadow-md">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-700">Profil Perangkat Desa</h2>
            <a href="{{ route('perangkat.villageprofile.create') }}"
                class="px-4 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition">
                + Tambah
            </a>
        </div>

        @if(session('success'))
            <div class="mb-4 p-3 bg-green-100 border border-green-400 text-green-800 rounded">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-hidden rounded-lg border border-gray-200">
            <table class="w-full text-sm text-gray-700">
                <thead class="bg-gray-50 text-gray-600 uppercase text-xs">
                    <tr>
                        <th class="px-4 py-3 text-left">Foto</th>
                        <th class="px-4 py-3 text-left">Nama</th>
                        <th class="px-4 py-3 text-left">Jabatan</th>
                        <th class="px-4 py-3 text-left">Alamat</th>
                        <th class="px-4 py-3 text-center">Kontak</th>
                        <th class="px-4 py-3 text-center w-32">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($profiles as $profile)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-4 py-3">
                                @if($profile->photo)
                                    <img src="{{ asset('storage/' . $profile->photo) }}" alt="Foto"
                                        class="w-12 h-12 rounded-full object-cover">
                                @else
                                    <span class="text-gray-400">-</span>
                                @endif
                            </td>
                            <td>

                                <div class="font-medium">{{ $profile->name }}</div>
                                <div>{{ $profile->nik }}</div>
                            </td>
                            <td class="px-4 py-3">{{ $profile->position->name ?? '-' }}</td>
                            <td class="px-4 py-3">{{ $profile->address ?? '-' }}</td>
                            <td class="px-4 py-3 text-center">
                                <div>{{ $profile->phone ?? '-' }}</div>
                                <div class="text-xs text-gray-500">{{ $profile->email ?? '-' }}</div>
                            </td>
                            <td class="px-4 py-3 text-center space-x-1">
                                <a href="{{ route('perangkat.villageprofile.edit', $profile->id) }}"
                                    class="inline-block px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600 text-xs">Edit</a>
                                <form action="{{ route('perangkat.villageprofile.destroy', $profile->id) }}" method="POST"
                                    class="inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" onclick="return confirm('Yakin ingin hapus?')"
                                        class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700 text-xs">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-4 py-6 text-center text-gray-500">Belum ada profil perangkat</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-4">
            {{ $profiles->links() }}
        </div>
    </div>
@endsection
