@extends('backend.index')

@section('page-title', 'Manajemen Jadwal')

@section('content')
    <div class="p-6 bg-white rounded shadow">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-bold">Daftar Jadwal</h2>
            <a href="{{ route('posts.create') }}" class="px-4 py-2 bg-green-600 text-white rounded">+ Tambah Jadwal</a>
        </div>

        @if(session('success'))
            <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
                {{ session('success') }}
            </div>
        @endif

        <table class="w-full border border-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-2 border">#</th>
                    <th class="p-2 border">Judul</th>
                    <th class="p-2 border">Hari</th>
                    <th class="p-2 border">Pukul</th>
                    <th class="p-2 border">Zona</th>
                    <th class="p-2 border">Status</th>
                    <th class="p-2 border">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($posts as $post)
                    <tr>
                        <td class="p-2 border">{{ $loop->iteration }}</td>
                        <td class="p-2 border">{{ $post->title }}</td>

                        {{-- Hari --}}
                        <td class="p-2 border">
                            {{ $post->day_start }}
                            @if($post->day_end)
                                - {{ $post->day_end }}
                            @endif
                        </td>

                        {{-- Pukul --}}
                        <td class="p-2 border">
                            {{ $post->time_start ? \Carbon\Carbon::parse($post->time_start)->format('H:i') : '' }}
                            @if($post->time_end)
                                - {{ \Carbon\Carbon::parse($post->time_end)->format('H:i') }}
                            @endif
                        </td>

                        <td class="p-2 border">{{ $post->timezone }}</td>

                        {{-- Status --}}
                        <td class="p-2 border">
                            <span
                                class="px-2 py-1 text-sm rounded {{ $post->open_status == 'buka' ? 'bg-green-200 text-green-700' : 'bg-red-200 text-red-700' }}">
                                {{ ucfirst($post->open_status) }}
                            </span>
                        </td>

                        {{-- Aksi --}}
                        <td class="p-2 border">
                            <a href="{{ route('posts.edit', $post->id) }}"
                                class="px-2 py-1 bg-blue-500 text-white rounded">Edit</a>
                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="inline-block"
                                onsubmit="return confirm('Hapus jadwal ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-2 py-1 bg-red-500 text-white rounded">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="p-4 text-center text-gray-500">Belum ada jadwal</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="mt-4">
            {{ $posts->links() }}
        </div>
    </div>
@endsection