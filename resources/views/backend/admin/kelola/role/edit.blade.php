@extends('backend.index')

@section('page-title', 'Edit Role')

@section('content')
    <div class="max-w-2xl mx-auto bg-white p-6 rounded-2xl shadow-lg">
        <!-- Header -->
        <h2 class="text-2xl font-bold mb-6 text-gray-800 flex items-center gap-2">
            <i data-feather="user-check" class="w-6 h-6 text-blue-500"></i>
            Edit Role
        </h2>

        <!-- Error Validation -->
        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-100 text-red-700 rounded-lg">
                <ul class="list-disc pl-5 space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Form -->
        <form action="{{ route('roles.update', $role->id) }}" method="POST" class="space-y-5">
            @csrf
            @method('PUT')

            <!-- Input Nama Role -->
            <div>
                <label for="name" class="block font-semibold text-gray-700 mb-2">Nama Role</label>
                <input type="text" name="name" id="name" value="{{ old('name', $role->name) }}"
                    class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 px-4 py-2"
                    required>
            </div>

            <!-- Actions -->
            <div class="flex justify-end space-x-3">
                <a href="{{ route('roles') }}"
                    class="px-4 py-2 bg-gray-400 text-white rounded-lg hover:bg-gray-500 transition">
                    Batal
                </a>
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition">
                    Update
                </button>
            </div>
        </form>
    </div>
@endsection