@extends('backend.index')

@section('page-title', 'Edit Aspirasi Warga (Perangkat Desa)')

@section('content')
    <div class="p-6 bg-white shadow rounded-xl max-w-3xl mx-auto">
        <h2 class="text-xl font-bold mb-4">Edit Aspirasi</h2>

        <div class="p-4 border rounded bg-gray-50">
            <p><strong>Judul:</strong> {{ $aspirasi->judul }}</p>
            <p class="mt-2"><strong>Isi:</strong> {{ $aspirasi->isi }}</p>
        </div>

        <form action="{{ route('perangkat.aspirasi.tanggapan', $aspirasi->id) }}" method="POST" class="mt-4 space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="font-semibold">Draft Tanggapan</label>
                <textarea name="draft_tanggapan" class="w-full border p-2 rounded"
                    placeholder="Tulis draft tanggapan...">{{ old('draft_tanggapan', $aspirasi->draft_tanggapan) }}</textarea>
            </div>

            <div>
                <label class="font-semibold">Status</label>
                <select name="status" class="w-full border p-2 rounded">
                    <option value="Menunggu" {{ $aspirasi->status == 'Menunggu' ? 'selected' : '' }}>Menunggu</option>
                    <option value="Diproses" {{ $aspirasi->status == 'Diproses' ? 'selected' : '' }}>Diproses</option>
                    <option value="Ditolak" {{ $aspirasi->status == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
                </select>
            </div>

            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Simpan Draft</button>
        </form>
    </div>
@endsection