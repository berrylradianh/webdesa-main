@extends('backend.index')

@section('page-title', 'Tambah FAQ')

@section('content')
    <div class="p-6 bg-white rounded-xl shadow-md max-w-2xl mx-auto">
        <h2 class="text-2xl font-bold mb-6">Tambah FAQ Baru</h2>

        <form action="{{ route('faq.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Pertanyaan</label>
                <input type="text" name="question" class="w-full px-4 py-2 border rounded-lg" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Jawaban</label>
                <textarea name="answer" class="w-full px-4 py-2 border rounded-lg" rows="5" required></textarea>
            </div>

            <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg">Simpan</button>
        </form>
    </div>
@endsection