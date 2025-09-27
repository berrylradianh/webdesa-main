@extends('backend.index')

@section('page-title', 'Edit SOP')

@section('content')
    <div class="p-6 bg-white rounded-xl shadow-md max-w-xl mx-auto">
        <h2 class="text-2xl font-bold mb-6">Edit SOP</h2>

        <form action="{{ route('sop.update', $sop->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block mb-1 font-medium">Judul</label>
                <input type="text" name="title" class="w-full border px-3 py-2 rounded"
                    value="{{ old('title', $sop->title) }}">
                @error('title') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-medium">Deskripsi</label>
                <textarea name="description"
                    class="w-full border px-3 py-2 rounded">{{ old('description', $sop->description) }}</textarea>
                @error('description') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>

            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">Update</button>
        </form>
    </div>
@endsection