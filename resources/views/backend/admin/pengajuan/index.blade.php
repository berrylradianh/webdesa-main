@extends('backend.index')

@section('page-title', 'Manajemen Pengajuan Surat')

@section('content')
    <div class="p-6 bg-white rounded-xl shadow-md">
        <h2 class="text-2xl font-bold mb-6 text-gray-800">Daftar Pengajuan Surat</h2>

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
                        <th class="px-4 py-3 border">Pemohon</th>
                        <th class="px-4 py-3 border">Template</th>
                        <th class="px-4 py-3 border">Keperluan</th>
                        <th class="px-4 py-3 border">Status</th>
                        <th class="px-4 py-3 border">Diproses Oleh</th>
                        <th class="px-4 py-3 border text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pengajuan as $item)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-4 py-3 border">{{ $loop->iteration }}</td>
                            <td class="px-4 py-3 border">{{ $item->warga->username ?? '-' }}</td>
                            <td class="px-4 py-3 border">{{ $item->template->name ?? '-' }}</td>
                            <td class="px-4 py-3 border">{{ $item->keperluan ?? '-' }}</td>
                            <td class="px-4 py-3 border">
                                <span class="px-3 py-1 text-xs font-semibold rounded-full text-white
                                                                        @if($item->status === 'pending') bg-gray-500 
                                                                        @elseif($item->status === 'diproses') bg-blue-500 
                                                                        @elseif($item->status === 'selesai') bg-green-500 
                                                                        @else bg-red-500 @endif">
                                    {{ ucfirst($item->status) }}
                                </span>
                                @if($item->override_status)
                                    <span class="ml-2 text-xs text-red-600 font-medium">(Override)</span>
                                @endif
                            </td>
                            <td class="px-4 py-3 border">{{ $item->processor->username ?? '-' }}</td>
                            <td class="px-4 py-3 border text-center">
                                <button class="px-3 py-1.5 bg-red-500 text-white rounded-lg hover:bg-red-600 text-sm shadow"
                                    onclick="openModal({{ $item->id }})">
                                    Override
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-6 text-gray-500">Belum ada pengajuan surat</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            {{ $pengajuan->links() }}
        </div>
    </div>

    <!-- Modal Override -->
    <div id="overrideModal" class="fixed inset-0 bg-black bg-opacity-50 hidden justify-center items-center z-50">
        <div class="bg-white w-full max-w-md p-6 rounded-xl shadow-lg relative">
            <h3 class="text-lg font-bold mb-4">Override Status Pengajuan</h3>
            <form id="overrideForm" method="POST">
                @csrf
                @method('PUT')
                <select name="status" class="w-full border rounded-lg px-3 py-2 mb-4 focus:ring focus:ring-blue-300">
                    <option value="pending">Pilih tindakan</option>
                    <option value="pending">Pending</option>
                    <option value="diproses">Diproses</option>
                    <option value="selesai">Selesai</option>
                    <option value="ditolak">Ditolak</option>
                </select>
                <div class="flex justify-end space-x-2">
                    <button type="button" onclick="closeModal()"
                        class="px-4 py-2 rounded-lg border bg-gray-100 hover:bg-gray-200">
                        Batal
                    </button>
                    <button type="submit" class="px-4 py-2 rounded-lg bg-red-500 text-white hover:bg-red-600">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openModal(id) {
            let form = document.getElementById('overrideForm');
            form.action = '/pengajuan/admin/override/' + id;
            document.getElementById('overrideModal').classList.remove('hidden');
            document.getElementById('overrideModal').classList.add('flex');
        }
        function closeModal() {
            document.getElementById('overrideModal').classList.add('hidden');
            document.getElementById('overrideModal').classList.remove('flex');
        }
    </script>
@endsection