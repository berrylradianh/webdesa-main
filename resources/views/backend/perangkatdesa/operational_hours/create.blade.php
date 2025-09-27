@extends('backend.index')

@section('page-title', 'Tambah Jam Operasional')

@section('content')
    <div class="max-w-3xl mx-auto bg-white p-6 rounded-xl shadow-md">
        <h2 class="text-xl font-bold mb-6">Tambah Jam Operasional</h2>

        <form action="{{ route('perangkat.operationalhours.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block mb-1">Hari</label>
                <select name="day" class="w-full border rounded p-2">
                    @foreach($days as $day)
                        <option value="{{ $day }}">{{ $day }}</option>
                    @endforeach
                </select>
            </div>

            <div id="time-fields">
                <div>
                    <label class="block mb-1">Jam Buka</label>
                    <input type="time" name="open_time" class="w-full border rounded p-2">
                </div>

                <div>
                    <label class="block mb-1">Jam Tutup</label>
                    <input type="time" name="close_time" class="w-full border rounded p-2">
                </div>
            </div>

            <div>
                <label class="inline-flex items-center">
                    <input type="checkbox" name="is_closed" id="is_closed" class="mr-2"> Tutup
                </label>
            </div>

            <div class="flex justify-end gap-2">
                <a href="{{ route('perangkat.operationalhours.index') }}"
                    class="px-4 py-2 bg-gray-500 text-white rounded">Batal</a>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Simpan</button>
            </div>
        </form>
    </div>

    <script>
        const isClosedCheckbox = document.getElementById('is_closed');
        const timeFields = document.getElementById('time-fields');

        function toggleTimeFields() {
            if (isClosedCheckbox.checked) {
                timeFields.style.display = 'none';
            } else {
                timeFields.style.display = 'block';
            }
        }

        isClosedCheckbox.addEventListener('change', toggleTimeFields);
        toggleTimeFields();
    </script>
@endsection