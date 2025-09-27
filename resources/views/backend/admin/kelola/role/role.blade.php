@extends('backend.index')

@section('page-title', 'Kelola Role')

@section('content')
    <div class="p-6 bg-white rounded-xl shadow-md">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Daftar Role</h2>
            <a href="{{ route('roles.create') }}"
                class="px-4 py-2 bg-[#3EB489] text-white rounded-lg hover:bg-[#34a97a] transition">
                + Tambah Role
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
                        <th class="px-4 py-3 border">Nama Role</th>
                        <th class="px-4 py-3 border text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($roles as $role)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-4 py-3 border">{{ $loop->iteration }}</td>
                            <td class="px-4 py-3 border">{{ $role->name }}</td>
                            <td class="px-4 py-3 border text-center space-x-2">
                                <a href="{{ route('roles.edit', $role) }}"
                                    class="px-3 py-1.5 text-white rounded-lg text-sm shadow
                                              {{ in_array($role->id, [1, 2, 3]) ? 'bg-gray-400 cursor-not-allowed pointer-events-none' : 'bg-blue-500 hover:bg-blue-600' }}">
                                    Edit
                                </a>
                                <form action="{{ route('roles.destroy', $role) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="px-3 py-1.5 text-white rounded-lg text-sm shadow
                                                {{ in_array($role->id, [1, 2, 3]) ? 'bg-gray-400 cursor-not-allowed pointer-events-none' : 'bg-red-500 hover:bg-red-600' }}">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center py-6 text-gray-500">Belum ada role</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection