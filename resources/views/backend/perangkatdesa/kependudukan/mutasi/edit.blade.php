@extends('backend.index')

@section('page-title', 'Edit Mutasi Kependudukan')

@section('content')
    <div class="p-6 bg-white rounded-xl shadow-md max-w-3xl mx-auto">
        <h2 class="text-2xl font-bold mb-6 text-gray-800">Edit Mutasi Kependudukan</h2>

        <form action="{{ route('perangkat.kependudukan.mutasi.update', $mutasi->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            {{-- Pilih Data Kependudukan --}}
            <div>
                <label class="block font-semibold mb-1">Data Kependudukan</label>
                <select name="data_kependudukan_id" class="w-full border rounded px-3 py-2" required>
                    @foreach ($dataKependudukan as $data)
                        <option value="{{ $data->id }}" {{ $mutasi->data_kependudukan_id == $data->id ? 'selected' : '' }}>
                            {{ $data->tahun }} - {{ $data->nama ?? 'Data Kependudukan' }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block font-semibold mb-1">Jumlah Lahir</label>
                <input type="number" name="lahir" value="{{ old('lahir', $mutasi->lahir) }}"
                    class="w-full border rounded px-3 py-2" required>
            </div>

            <div>
                <label class="block font-semibold mb-1">Jumlah Meninggal</label>
                <input type="number" name="meninggal" value="{{ old('meninggal', $mutasi->meninggal) }}"
                    class="w-full border rounded px-3 py-2" required>
            </div>

            <div>
                <label class="block font-semibold mb-1">Jumlah Pindah Keluar</label>
                <input type="number" name="pindah_keluar" value="{{ old('pindah_keluar', $mutasi->pindah_keluar) }}"
                    class="w-full border rounded px-3 py-2" required>
            </div>

            <div>
                <label class="block font-semibold mb-1">Jumlah Pindah Masuk</label>
                <input type="number" name="pindah_masuk" value="{{ old('pindah_masuk', $mutasi->pindah_masuk) }}"
                    class="w-full border rounded px-3 py-2" required>
            </div>

            <div class="flex justify-end space-x-2">
                <a href="{{ route('perangkat.kependudukan.mutasi.index') }}"
                    class="px-4 py-2 bg-gray-500 text-white rounded">Batal</a>
                <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded">Simpan</button>
            </div>
        </form>
    </div>
@endsection