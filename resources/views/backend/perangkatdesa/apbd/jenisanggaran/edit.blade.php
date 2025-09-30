@extends('backend.index')

@section('page-title', 'Edit Jenis Anggaran')

@section('content')
<div class="max-w-5xl mx-auto bg-white p-8 rounded-2xl shadow-lg mt-8">
    <h2 class="text-3xl font-bold text-gray-800 mb-6 border-b-2 border-gray-200 pb-3">Edit Jenis Anggaran</h2>

    <form action="{{ route('budget_types.update', $budgetType->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Nama Jenis Anggaran</label>
            <input type="text" name="name" value="{{ old('name', $budgetType->name) }}"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('name') border-red-500 @enderror transition duration-150">
            @error('name')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Icon (HTML atau Emoji)</label>
            <input type="text" name="icon" value="{{ old('icon', $budgetType->icon) }}"
                placeholder="Contoh: 📁 atau &lt;i class='fas fa-money-bill'&gt;&lt;/i&gt;"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('icon') border-red-500 @enderror transition duration-150">
            @error('icon')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
            <p class="text-gray-500 text-xs mt-1">Bisa menggunakan emoji atau HTML icon.</p>
        </div>

        <div class="flex justify-end space-x-4 mt-8">
            <a href="{{ route('budget_types.index') }}"
                class="px-6 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition duration-150">Batal</a>
            <button type="submit"
                class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-150">Update</button>
        </div>
    </form>
</div>
@endsection
