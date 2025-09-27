@extends('backend.index')

@section('page-title', 'Mutasi Kependudukan')

@section('content')
    <div class="p-6 bg-white rounded-xl shadow-md max-w-6xl mx-auto">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Mutasi Kependudukan</h2>
        </div>

        {{-- Success Alert --}}
        @if(session('success'))
            <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-lg">
                <div class="flex items-center">
                    <svg class="h-5 w-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <p class="ml-3 text-sm text-green-800 font-medium">{{ session('success') }}</p>
                </div>
            </div>
        @endif

        {{-- Table --}}
        <div class="overflow-x-auto rounded-lg border border-gray-200 shadow-sm">
            <table class="min-w-full divide-y divide-gray-200 bg-white">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tahun
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jumlah
                            Pindah Masuk</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jumlah
                            Pindah Keluar</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status
                        </th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($mutasi as $item)
                                <tr class="hover:bg-gray-50 transition duration-200">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        {{ $item->dataKependudukan->tahun ?? '-' }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $item->dataKependudukan->user->username
                        ?? '-' }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 font-semibold">
                                        {{ number_format($item->pindah_masuk ?? 0) }}
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 font-semibold">
                                        {{ number_format($item->pindah_keluar ?? 0) }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if($item->status == 'pending')
                                            <span
                                                class="inline-block px-3 py-1 text-xs font-medium rounded-full bg-yellow-100 text-yellow-800 border border-yellow-200">Pending</span>
                                        @elseif($item->status == 'approved')
                                            <span
                                                class="inline-block px-3 py-1 text-xs font-medium rounded-full bg-green-100 text-green-800 border border-green-200">Approved</span>
                                        @elseif($item->status == 'rejected')
                                            <span
                                                class="inline-block px-3 py-1 text-xs font-medium rounded-full bg-red-100 text-red-800 border border-red-200">Rejected</span>
                                        @else
                                            <span
                                                class="inline-block px-3 py-1 text-xs font-medium rounded-full bg-gray-100 text-gray-800 border border-gray-200">Unknown</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <button onclick="openModal({{ $item->id }}, '{{ $item->status }}')"
                                            class="px-4 py-2 bg-blue-600 text-white text-sm rounded-md hover:bg-blue-700 transition duration-200">
                                            Update Status
                                        </button>
                                    </td>
                                </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-12 text-center">
                                <div class="text-gray-500">
                                    <p class="text-lg font-medium mb-2">Belum ada data mutasi.</p>
                                    <p class="text-sm">Silakan tunggu input dari perangkat desa atau tambahkan data baru.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        @if(method_exists($mutasi, 'links'))
            <div class="mt-6">
                {{ $mutasi->links() }}
            </div>
        @endif
    </div>

    {{-- Modal Dinamis --}}
    <div id="modal-dinamis" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="mt-3">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Update Status Mutasi</h3>
                <form action="" method="POST" id="form-dinamis">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="status" id="status-dinamis" value="">
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Pilih Status</label>
                        <select id="status-select-dinamis" onchange="updateStatusHiddenDinamis()"
                            class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="">Pilih Salah Satu</option>
                            <option value="approved">Approved</option>
                            <option value="rejected">Rejected</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Catatan Admin</label>
                        <textarea name="catatan_admin" rows="4"
                            class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Masukkan catatan untuk admin (opsional)"></textarea>
                    </div>
                    <div class="flex justify-end space-x-3">
                        <button type="button" onclick="closeModalDinamis()"
                            class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400 transition duration-200">Batal</button>
                        <button type="submit"
                            class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition duration-200">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- JavaScript --}}
    <script>
        function openModal(id, currentStatus = '') {
            const modal = document.getElementById('modal-dinamis');
            const form = document.getElementById('form-dinamis');
            const statusSelect = document.getElementById('status-select-dinamis');
            const statusHidden = document.getElementById('status-dinamis');

            // Route update-status mutasi
            form.action = '{{ url("admin/mutasi-kependudukan") }}/' + id + '/update-status';

            // Set status default
            statusSelect.value = currentStatus || '';
            statusHidden.value = currentStatus || '';

            modal.classList.remove('hidden');
        }

        function closeModalDinamis() {
            document.getElementById('modal-dinamis').classList.add('hidden');
        }

        function updateStatusHiddenDinamis() {
            const select = document.getElementById('status-select-dinamis');
            document.getElementById('status-dinamis').value = select.value;
        }

        // Close modal on outside click
        window.onclick = function (event) {
            const modal = document.getElementById('modal-dinamis');
            if (event.target === modal) {
                closeModalDinamis();
            }
        }
    </script>
@endsection