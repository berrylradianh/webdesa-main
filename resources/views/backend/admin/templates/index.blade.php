@extends('backend.index')

@section('page-title', 'Manajemen Template Surat')

@section('content')
    <div class="p-6 bg-white rounded-xl shadow-md">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Daftar Template Surat</h2>
            <a href="{{ route('templates.create') }}"
                class="px-4 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition">
                + Tambah Template
            </a>
        </div>

        @if(session('success'))
            <div class="p-4 mb-6 text-green-800 bg-green-100 rounded-lg border border-green-300">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-x-auto rounded-lg border border-gray-200">
            <table class="w-full text-sm text-left border-collapse">
                <thead>
                    <tr class="bg-gray-100 text-gray-700">
                        <th class="px-4 py-3 border">#</th>
                        <th class="px-4 py-3 border">Nama</th>
                        <th class="px-4 py-3 border">Deskripsi</th>
                        <th class="px-4 py-3 border">Dibuat Oleh</th>
                        <th class="px-4 py-3 border">File</th>
                        <th class="px-4 py-3 border text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($templates as $template)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-4 py-3 border">{{ $loop->iteration }}</td>
                            <td class="px-4 py-3 border font-medium text-gray-800">{{ $template->name }}</td>
                            <td class="px-4 py-3 border text-gray-600">{{ $template->description ?? '-' }}</td>
                            <td class="px-4 py-3 border">{{ $template->creator->username ?? '-' }}</td>
                            <td class="px-4 py-3 border">
                                <a href="{{ asset('storage/' . $template->file_path) }}" target="_blank"
                                    class="text-blue-600 hover:underline font-medium">
                                    📄 Lihat File
                                </a>
                            </td>
                            <td class="px-4 py-3 border text-center space-x-2">
                                <a href="{{ route('templates.edit', $template->id) }}"
                                    class="inline-block px-3 py-1.5 bg-yellow-500 text-white rounded-lg shadow hover:bg-yellow-600 text-sm">
                                    Edit
                                </a>
                                <form action="{{ route('templates.destroy', $template->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Yakin hapus template ini?')"
                                        class="px-3 py-1.5 bg-red-600 text-white rounded-lg shadow hover:bg-red-700 text-sm">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-6 text-gray-500">Belum ada template surat</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            {{ $templates->links() }}
        </div>
    </div>
@endsection