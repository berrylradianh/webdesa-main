@extends('backend.index')

@section('page-title', 'FAQ Management')

@section('content')
    <div class="p-6 bg-white rounded-xl shadow-md">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Daftar FAQ</h2>
            <a href="{{ route('faq.create') }}" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg">
                Tambah FAQ
            </a>
        </div>

        @if(session('success'))
            <div class="p-4 mb-4 text-green-800 bg-green-100 rounded-lg border border-green-300">
                {{ session('success') }}
            </div>
        @endif

        <table class="w-full text-left border border-gray-200 rounded-lg">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-3 border-b">#</th>
                    <th class="p-3 border-b">Pertanyaan</th>
                    <th class="p-3 border-b">Jawaban</th>
                    <th class="p-3 border-b">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($faqs as $faq)
                    <tr class="hover:bg-gray-50">
                        <td class="p-3 border-b">{{ $loop->iteration }}</td>
                        <td class="p-3 border-b">{{ $faq->question }}</td>
                        <td class="p-3 border-b">{{ $faq->answer }}</td>
                        <td class="p-3 border-b flex gap-2">
                            <a href="{{ route('faq.edit', $faq->id) }}"
                                class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded-lg">Edit</a>
                            <form action="{{ route('faq.destroy', $faq->id) }}" method="POST"
                                onsubmit="return confirm('Hapus FAQ ini?');">
                                @csrf
                                @method('DELETE')
                                <button class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-lg">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection