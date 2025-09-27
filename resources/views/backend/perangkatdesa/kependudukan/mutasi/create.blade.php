@extends('backend.index')

@section('page-title', 'Tambah Mutasi Kependudukan')

@section('content')
    <div class="p-6 bg-white rounded-xl shadow-md max-w-3xl mx-auto">
        <h2 class="text-2xl font-bold mb-6 text-gray-800">Tambah Mutasi Kependudukan</h2>

        <form action="{{ route('perangkat.kependudukan.mutasi.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="block font-semibold mb-1">Data Kependudukan</label>
                <select name="data_kependudukan_id" id="dataKependudukan" class="w-full border rounded px-3 py-2" required>
                    <option value="">-- Pilih Data Kependudukan --</option>
                    @foreach($dataKependudukan as $data)
                        <option value="{{ $data->id }}" data-tahun="{{ $data->tahun }}">
                            {{ $data->nama_kepala_keluarga ?? $data->id }}
                            (Tahun: {{ $data->tahun }})
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block font-semibold mb-1">Jumlah Lahir</label>
                <input type="number" name="lahir" class="w-full border rounded px-3 py-2" required>
            </div>

            <div>
                <label class="block font-semibold mb-1">Jumlah Meninggal</label>
                <input type="number" name="meninggal" class="w-full border rounded px-3 py-2" required>
            </div>

            <div>
                <label class="block font-semibold mb-1">Jumlah Pindah Keluar</label>
                <input type="number" name="pindah_keluar" class="w-full border rounded px-3 py-2" required>
            </div>

            <div>
                <label class="block font-semibold mb-1">Jumlah Pindah Masuk</label>
                <input type="number" name="pindah_masuk" class="w-full border rounded px-3 py-2" required>
            </div>

            <div class="flex justify-end space-x-2">
                <a href="{{ route('perangkat.kependudukan.mutasi.index') }}"
                    class="px-4 py-2 bg-gray-500 text-white rounded">Batal</a>
                <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded">Simpan</button>
            </div>
        </form>
    </div>

    <script>
        document.getElementById('dataKependudukan').addEventListener('change', function () {
            const tahun = this.selectedOptions[0].dataset.tahun;
            document.getElementById('tahun').value = tahun || '';
        });
    </script>
@endsection