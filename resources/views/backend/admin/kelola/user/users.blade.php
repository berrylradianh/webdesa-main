@extends('backend.index')

@section('page-title', 'Kelola User')

@section('content')
    <div class="p-6 bg-white rounded-xl shadow-md">
        <h2 class="text-2xl font-bold mb-6 text-gray-800">Daftar User</h2>

        @if(session('success'))
            <div class="p-4 mb-6 text-green-800 bg-green-100 rounded-lg border border-green-300">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="p-4 mb-6 text-red-800 bg-red-100 rounded-lg border border-red-300">
                {{ session('error') }}
            </div>
        @endif

        <div class="overflow-x-auto rounded-lg border border-gray-200">
            <table class="w-full text-sm text-left border-collapse">
                <thead>
                    <tr class="bg-gray-100 text-gray-700">
                        <th class="px-4 py-3 border">#</th>
                        <th class="px-4 py-3 border">Nama</th>
                        <th class="px-4 py-3 border">Email</th>
                        <th class="px-4 py-3 border">Role</th>
                        <th class="px-4 py-3 border text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-4 py-3 border">{{ $loop->iteration }}</td>
                            <td class="px-4 py-3 border">{{ $user->username }}</td>
                            <td class="px-4 py-3 border">{{ $user->email }}</td>
                            <td class="px-4 py-3 border">
                                <span class="px-3 py-1 text-xs font-semibold rounded-full text-white
                                        @if($user->role->name === 'admin') bg-blue-500
                                        @elseif($user->role->name === 'user') bg-green-500
                                        @else bg-gray-500 @endif">
                                    {{ ucfirst($user->role->name) }}
                                </span>
                            </td>
                            <td class="px-4 py-3 border text-center space-x-2">
                                <a href="{{ route('users.edit', $user->id) }}"
                                    class="px-3 py-1.5 bg-blue-500 text-white rounded-lg hover:bg-blue-600 text-sm shadow">
                                    Edit
                                </a>
                                <button class="px-3 py-1.5 bg-red-500 text-white rounded-lg hover:bg-red-600 text-sm shadow"
                                    onclick="openDeleteModal({{ $user->id }})">
                                    Hapus
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-6 text-gray-500">Belum ada data user</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            {{ $users->links() }}
        </div>
    </div>

    <!-- Modal Hapus -->
    <div id="deleteModal" class="fixed inset-0 bg-black bg-opacity-50 hidden justify-center items-center z-50">
        <div class="bg-white w-full max-w-md p-6 rounded-xl shadow-lg relative">
            <h3 class="text-lg font-bold mb-4">Hapus User</h3>
            <p class="mb-4">Apakah Anda yakin ingin menghapus user ini?</p>
            <form id="deleteForm" method="POST">
                @csrf
                @method('DELETE')
                <div class="flex justify-end space-x-2">
                    <button type="button" onclick="closeDeleteModal()"
                        class="px-4 py-2 rounded-lg border bg-gray-100 hover:bg-gray-200">
                        Batal
                    </button>
                    <button type="submit" class="px-4 py-2 rounded-lg bg-red-500 text-white hover:bg-red-600">
                        Hapus
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openDeleteModal(id) {
            let form = document.getElementById('deleteForm');
            form.action = '/users/delete/' + id;
            document.getElementById('deleteModal').classList.remove('hidden');
            document.getElementById('deleteModal').classList.add('flex');
        }
        function closeDeleteModal() {
            document.getElementById('deleteModal').classList.add('hidden');
            document.getElementById('deleteModal').classList.remove('flex');
        }
    </script>
@endsection