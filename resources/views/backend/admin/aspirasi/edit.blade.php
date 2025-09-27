@extends('backend.index')

@section('page-title', 'Edit Aspirasi (Admin)')

@section('content')
    <div class="max-w-4xl mx-auto p-6 bg-white rounded-xl shadow-md">
        <h2 class="text-2xl font-bold mb-6 text-gray-800 border-b pb-3">
            Detail & Finalisasi Aspirasi
        </h2>

        <!-- Informasi Aspirasi -->
        <div class="mb-6">
            <h3 class="text-lg font-semibold text-gray-700 mb-3">Informasi Aspirasi</h3>
            <div class="grid grid-cols-2 gap-4 text-gray-700">
                <div>
                    <p class="font-medium">Judul:</p>
                    <p class="bg-gray-50 px-3 py-2 rounded-md border">{{ $aspirasi->judul }}</p>
                </div>
                <div>
                    <p class="font-medium">Warga:</p>
                    <p class="bg-gray-50 px-3 py-2 rounded-md border">
                        {{ $aspirasi->warga->username ?? '-' }}
                    </p>
                </div>
                <div class="col-span-2">
                    <p class="font-medium">Isi Aspirasi:</p>
                    <p class="bg-gray-50 px-3 py-3 rounded-md border">{{ $aspirasi->isi }}</p>
                </div>
            </div>
        </div>

        <!-- Draft Tanggapan dari Perangkat Desa -->
        <div class="mb-6">
            <h3 class="text-lg font-semibold text-gray-700 mb-3">Draft Tanggapan (Perangkat Desa)</h3>
            @if($aspirasi->tanggapan->where('tipe', 'draft')->first())
                <div class="p-4 bg-yellow-50 border border-yellow-200 rounded-lg">
                    <p class="text-gray-700">
                        {{ $aspirasi->tanggapan->where('tipe', 'draft')->first()->isi }}
                    </p>
                </div>
            @else
                <p class="text-gray-500 italic">Belum ada draft tanggapan dari perangkat desa.</p>
            @endif
        </div>

        <!-- Form Finalisasi Tanggapan -->
        <div>
            <h3 class="text-lg font-semibold text-gray-700 mb-3">Finalisasi oleh Admin</h3>
            <form action="{{ route('admin.aspirasi.approve', $aspirasi->id) }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')

                <!-- Tanggapan Final -->
                <div>
                    <label for="isi" class="block font-medium text-gray-700 mb-2">Tanggapan Final</label>
                    <textarea id="isi" name="isi" rows="5"
                        class="w-full border rounded-md p-3 focus:ring focus:ring-blue-200"
                        placeholder="Tuliskan tanggapan final...">{{ old('isi', $aspirasi->tanggapan->where('tipe', 'final')->first()->isi ?? '') }}</textarea>
                    @error('isi')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Pilih Status -->
                <div>
                    <label for="status" class="block font-medium text-gray-700 mb-2">Status Aspirasi</label>
                    <select id="status" name="status" class="w-full border rounded-md p-3 focus:ring focus:ring-blue-200">
                        <option value="Menunggu" {{ $aspirasi->status == 'Menunggu' ? 'selected' : '' }}>Menunggu</option>
                        <option value="Diproses" {{ $aspirasi->status == 'Diproses' ? 'selected' : '' }}>Diproses</option>
                        <option value="Ditolak" {{ $aspirasi->status == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
                        <option value="Selesai" {{ $aspirasi->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                    </select>
                    @error('status')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Tombol -->
                <div class="flex justify-end">
                    <button type="submit"
                        class="px-5 py-2 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition">
                        Publikasikan Tanggapan Final
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection