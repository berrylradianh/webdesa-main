@extends('backend.index')

@section('page-title', 'Detail Pengajuan Surat')

@section('content')
    <div class="max-w-3xl mx-auto p-4 bg-white rounded-xl shadow-md">
        <h2 class="text-2xl font-bold text-gray-900 mb-6 border-b pb-3">Detail Pengajuan Surat</h2>

        <!-- Informasi Warga & Pengajuan -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
            <!-- Kolom Kiri -->
            <div class="space-y-4">
                <div>
                    <h3 class="text-base font-semibold text-gray-700 mb-1">Nama Warga</h3>
                    <p class="text-gray-900 text-sm">{{ $pengajuan->nama_lengkap ?? '-' }}</p>
                </div>
                <div>
                    <h3 class="text-base font-semibold text-gray-700 mb-1">Template Surat</h3>
                    <p class="text-gray-900 text-sm">{{ $pengajuan->template->name ?? '-' }}</p>
                </div>
                <div>
                    <h3 class="text-base font-semibold text-gray-700 mb-1">Status</h3>
                    <div class="inline-flex items-center space-x-2">
                        @php
                            $statusColors = [
                                'pending' => 'bg-gray-400 text-white',
                                'diproses' => 'bg-blue-500 text-white',
                                'selesai' => 'bg-green-500 text-white',
                                'ditolak' => 'bg-red-500 text-white',
                            ];
                            $colorClass = $statusColors[$pengajuan->status] ?? 'bg-gray-300 text-gray-700';
                        @endphp
                        <span class="px-3 py-0.5 rounded-full font-semibold text-sm {{ $colorClass }} capitalize">
                            {{ $pengajuan->status }}
                        </span>
                        @if($pengajuan->override_status)
                            <span class="text-xs text-red-600 font-medium">(Override)</span>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Kolom Kanan -->
            <div class="space-y-4">
                <div>
                    <h3 class="text-base font-semibold text-gray-700 mb-1">Diajukan</h3>
                    <p class="text-gray-900 text-sm">
                        {{ $pengajuan->created_at->timezone('Asia/Jakarta')->format('d M Y') }}
                    </p>
                </div>
                <div>
                    <h3 class="text-base font-semibold text-gray-700 mb-1">Pukul</h3>
                    <p class="text-gray-900 text-sm">{{ $pengajuan->created_at->timezone('Asia/Jakarta')->format('H:i') }}
                        WIB</p>
                </div>
                <div>
                    <h3 class="text-base font-semibold text-gray-700 mb-1">Diproses Oleh</h3>
                    <p class="text-gray-900 text-sm">{{ $pengajuan->processor->username ?? '-' }}</p>
                </div>
            </div>
        </div>

        <!-- Keterangan -->
        <div class="mb-6">
            <h3 class="font-semibold text-gray-700 mb-2">Keterangan:</h3>
            <div class="bg-gray-50 border border-gray-200 shadow-sm rounded-lg p-5 text-gray-800 break-words">
                @if($pengajuan->keperluan)
                    {{ $pengajuan->keperluan }}
                @else
                    <span class="text-gray-400 italic">Belum ada keterangan</span>
                @endif
            </div>
        </div>

        <hr class="mb-8 border-gray-200">

        <!-- Form Update Status -->
        <form method="POST" action="{{ route('pengajuan.perangkat.updateStatus', $pengajuan->id) }}" class="space-y-5">
            @csrf
            @method('PUT')

            <div>
                <label for="status" class="block text-base font-semibold text-gray-700 mb-1">Ubah Status</label>
                <select id="status" name="status" required
                    class="w-full md:w-1/3 border border-gray-300 rounded-md p-2 text-gray-900 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="pilih" {{ $pengajuan->status ? 'pilih' : 'selected' }}>Pilih Status</option>
                    <option value="diproses" {{ $pengajuan->status == 'diproses' ? 'selected' : '' }}>Diproses</option>
                    <option value="selesai" {{ $pengajuan->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                    <option value="ditolak" {{ $pengajuan->status == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                </select>
            </div>

            <div class="flex justify-end space-x-3">
                <a href="{{ route('pengajuan.perangkat.index') }}"
                    class="inline-block px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 transition text-sm">
                    Batal
                </a>
                <button type="submit"
                    class="inline-block px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition text-sm">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
@endsection
