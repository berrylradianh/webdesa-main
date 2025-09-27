@extends('backend.index')

@section('page-title', 'Daftar Survey')

@section('content')
    <div class="p-6 bg-white rounded-xl shadow-md">
        <h2 class="text-2xl font-bold mb-6 text-gray-800">Daftar Survey</h2>

        <a href="{{ route('surveys.create') }}"
            class="mb-4 inline-block px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">
            + Buat Survey
        </a>

        <table class="w-full border border-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 border">Judul</th>
                    <th class="px-4 py-2 border">Deskripsi</th>
                    <th class="px-4 py-2 border">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($surveys as $survey)
                    <tr>
                        <td class="px-4 py-2 border font-semibold">{{ $survey->judul }}</td>
                        <td class="px-4 py-2 border">{{ $survey->deskripsi }}</td>
                        <td class="px-4 py-2 border space-x-2">
                            <a href="{{ route('surveys.show', $survey->id) }}"
                                class="px-3 py-1 bg-blue-500 text-white rounded">Lihat</a>
                            <a href="{{ route('surveys.edit', $survey->id) }}"
                                class="px-3 py-1 bg-yellow-500 text-white rounded">Edit</a>
                            <form action="{{ route('surveys.destroy', $survey->id) }}" method="POST" class="inline-block"
                                onsubmit="return confirm('Hapus survey ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="px-3 py-1 bg-red-500 text-white rounded">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection