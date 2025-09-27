@extends('backend.index')

@section('page-title', 'Tambah Polling')

@section('content')
    <div class="p-6 bg-white rounded-xl shadow-md max-w-xl mx-auto">
        <h2 class="text-2xl font-bold mb-6">Tambah Polling</h2>

        <form action="{{ route('polling.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="block mb-1 font-medium">Judul Polling</label>
                <input type="text" name="title" class="w-full border px-3 py-2 rounded" value="{{ old('title') }}">
                @error('title') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>

            <div id="options-wrapper">
                <label class="block mb-1 font-medium">Opsi Polling</label>
                <div class="mb-2">
                    <input type="text" name="options[]" class="w-full border px-3 py-2 rounded" placeholder="Opsi 1">
                </div>
                <div class="mb-2">
                    <input type="text" name="options[]" class="w-full border px-3 py-2 rounded" placeholder="Opsi 2">
                </div>
            </div>

            <button type="button" id="add-option" class="mb-4 bg-gray-300 hover:bg-gray-400 px-3 py-1 rounded">Tambah
                Opsi</button>
            <br>
            <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded">Simpan
                Polling</button>
        </form>
    </div>

    <script>
        document.getElementById('add-option').addEventListener('click', function () {
            const wrapper = document.getElementById('options-wrapper');
            const count = wrapper.querySelectorAll('input').length + 1;
            const div = document.createElement('div');
            div.classList.add('mb-2');
            div.innerHTML = `<input type="text" name="options[]" class="w-full border px-3 py-2 rounded" placeholder="Opsi ${count}">`;
            wrapper.appendChild(div);
        });
    </script>
@endsection