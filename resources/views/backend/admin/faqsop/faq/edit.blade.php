@extends('backend.index')

@section('page-title', 'Edit FAQ')

@section('content')
    <div class="p-6 bg-white rounded-xl shadow-md max-w-2xl mx-auto">
        <h2 class="text-2xl font-bold mb-6">Edit FAQ</h2>

        <form action="{{ route('faq.update', $faq->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Pertanyaan</label>
                <input type="text" name="question" class="w-full px-4 py-2 border rounded-lg" value="{{ $faq->question }}"
                    required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Jawaban</label>
                <textarea name="answer" class="w-full px-4 py-2 border rounded-lg" rows="5"
                    required>{{ $faq->answer }}</textarea>
            </div>

            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg">Update</button>
        </form>
    </div>
@endsection