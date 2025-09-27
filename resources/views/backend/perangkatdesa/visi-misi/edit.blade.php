@extends('backend.index')
@section('page-title', 'Edit Visi & Misi')

@section('content')
    <div class="max-w-4xl mx-auto bg-white p-6 rounded-xl shadow-md">
        <h2 class="text-2xl font-bold mb-6 border-b pb-2">Edit Visi & Misi</h2>

        <form action="{{ route('perangkat.visi-misi.update', $visiMisi->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            {{-- Visi --}}
            <div class="mb-4">
                <label class="block mb-2 font-semibold">Visi</label>
                <textarea name="visi" rows="4"
                    class="w-full border-2 border-gray-300 rounded-lg p-2 focus:outline-none focus:border-blue-500">{{ old('visi', $visiMisi->visi) }}</textarea>
                @error('visi') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            {{-- Misi --}}
            <div class="mb-4">
                <label class="block mb-2 font-semibold">Daftar Misi</label>
                <div id="misiList">
                    @foreach($visiMisi->misi as $item)
                        <div class="flex items-center mb-2">
                            <input type="text" name="misi_items[]" value="{{ $item->misi }}"
                                class="w-full border-2 border-gray-300 rounded-lg p-2 focus:outline-none focus:border-blue-500">
                            <button type="button" class="ml-2 px-3 py-1 bg-red-500 text-white rounded remove-btn">Hapus</button>
                        </div>
                    @endforeach
                </div>
                <button type="button" id="addMisi" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Tambah
                    Misi</button>
            </div>

            <div class="flex justify-end space-x-3">
                <a href="{{ route('perangkat.visi-misi.index') }}"
                    class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">Batal</a>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Simpan</button>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const addBtn = document.getElementById('addMisi');
            const list = document.getElementById('misiList');

            addBtn.addEventListener('click', function () {
                const div = document.createElement('div');
                div.classList.add('flex', 'items-center', 'mb-2');
                div.innerHTML = `
                <input type="text" name="misi_items[]" class="w-full border-2 border-gray-300 rounded-lg p-2 focus:outline-none focus:border-blue-500">
                <button type="button" class="ml-2 px-3 py-1 bg-red-500 text-white rounded remove-btn">Hapus</button>
            `;
                list.appendChild(div);
            });

            list.addEventListener('click', function (e) {
                if (e.target.classList.contains('remove-btn')) {
                    e.target.parentElement.remove();
                }
            });
        });
    </script>
@endsection