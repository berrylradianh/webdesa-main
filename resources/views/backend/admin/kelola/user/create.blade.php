@extends('backend.index')

@section('page-title', 'Tambah User')

@section('content')
    <div class="max-w-2xl mx-auto bg-white rounded-lg shadow-md p-6">
        <h2 class="text-2xl font-bold text-gray-700 mb-6 border-b pb-2">
            Tambah User
        </h2>

        <form method="POST" action="{{ route('users.store') }}" class="space-y-5">
            @csrf

            <div>
                <label class="block text-gray-600 font-medium mb-1">Username</label>
                <input type="text" name="username" value="{{ old('username') }}"
                    class="w-full border border-gray-300 p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#3EB489]"
                    required>
                @error('username')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-gray-600 font-medium mb-1">Email</label>
                <input type="email" name="email" value="{{ old('email') }}"
                    class="w-full border border-gray-300 p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#3EB489]"
                    required>
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-gray-600 font-medium mb-1">Password</label>
                <input type="password" name="password"
                    class="w-full border border-gray-300 p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#3EB489]"
                    required>
                @error('password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-gray-600 font-medium mb-1">Role</label>
                <select name="role_id"
                    class="w-full border border-gray-300 p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#3EB489]"
                    required>
                    <option value="">-- Pilih Role --</option>
                    @foreach($roles as $role)
                        <option value="{{ $role->id }}" {{ old('role_id') == $role->id ? 'selected' : '' }}>
                            {{ $role->name }}
                        </option>
                    @endforeach
                </select>
                @error('role_id')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- <div class="flex items-center justify-between">
                    <button type="submit" class="bg-[#3EB489] hover:bg-[#34a178] text-white px-5 py-2.5 rounded-lg shadow">
                        Simpan
                    </button>
                    <a href="{{ route('users') }}" class="text-gray-600 hover:text-[#007BFF] font-medium">
                        Batal
                    </a>
                </div> -->
            <div class="flex justify-end gap-3 pt-4">
                <a href="{{ route('users') }}"
                    class="px-4 py-2 rounded-lg border border-gray-300 text-gray-600 hover:bg-gray-100 transition">
                    Batal
                </a>
                <button type="submit" class="bg-[#3EB489] hover:bg-[#34a178] text-white px-5 py-2.5 rounded-lg shadow">
                    Simpan
                </button>
            </div>
        </form>
    </div>
@endsection