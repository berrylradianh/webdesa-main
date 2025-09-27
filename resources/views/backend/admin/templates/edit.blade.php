@extends('backend.index')

@section('page-title', 'Edit Template Surat')

@section('content')
    <div class="p-6 bg-white rounded shadow">
        <h2 class="text-xl font-bold mb-4">Edit Template Surat</h2>

        <form action="{{ route('templates.update', $template->id) }}" method="POST" enctype="multipart/form-data"
            class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block font-semibold">Nama Template</label>
                <input type="text" name="name" value="{{ old('name', $template->name) }}"
                    class="w-full border rounded px-3 py-2" required>
                @error('name')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block font-semibold">Deskripsi</label>
                <textarea name="description"
                    class="w-full border rounded px-3 py-2">{{ old('description', $template->description) }}</textarea>
                @error('description')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block font-semibold">File Template (opsional)</label>
                <input type="file" name="file" class="w-full border rounded px-3 py-2">
                @if($template->file_path)
                    <p class="mt-2">
                        File sekarang:
                        <a href="{{ asset('storage/' . $template->file_path) }}" target="_blank" class="text-blue-600 underline">
                            {{ basename($template->file_path) }}
                        </a>
                    </p>
                @endif
                @error('file')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                Update
            </button>
            <a href="{{ route('templates.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">
                Batal
            </a>
        </form>
    </div>
@endsection