@extends('backend.index')

@section('page-title', 'Edit Jam Operasional')

@section('content')
    <div class="max-w-4xl mx-auto bg-white p-8 rounded-xl shadow-md">
        <h2 class="text-2xl font-bold text-gray-700 mb-6 border-b pb-2">Edit Jam Operasional</h2>

        @if ($errors->any())
            <div class="mb-4 p-4 text-red-800 bg-red-100 border border-red-300 rounded-lg">
                <ul class="list-disc pl-6">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('perangkat.operationalhours.update', $operationalHour->id) }}" method="POST"
            class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Hari -->
            <div>
                <label class="block text-gray-700 font-semibold mb-2">Hari</label>
                <input type="text" value="{{ $operationalHour->day }}" disabled
                    class="w-full border-gray-300 rounded-lg shadow-sm bg-gray-100">
                <input type="hidden" name="day" value="{{ $operationalHour->day }}">
            </div>

            <!-- Checkbox Tutup -->
            <div class="flex items-center">
                <input type="hidden" name="is_closed" value="0">
                <input type="checkbox" name="is_closed" id="is_closed" value="1"
                    class="h-5 w-5 text-blue-600 border-gray-300 rounded" {{ $operationalHour->is_closed ? 'checked' : '' }}>
                <label for="is_closed" class="ml-2 text-gray-700">Tutup</label>
            </div>

            <!-- Jam Buka -->
            <div id="open_time_container">
                <label for="open_time" class="block text-gray-700 font-semibold mb-2">Jam Buka</label>
                <input type="time" name="open_time" id="open_time" value="{{ $operationalHour->open_time }}"
                    class="w-full border-gray-300 rounded-lg shadow-sm">
            </div>

            <!-- Jam Tutup -->
            <div id="close_time_container">
                <label for="close_time" class="block text-gray-700 font-semibold mb-2">Jam Tutup</label>
                <input type="time" name="close_time" id="close_time" value="{{ $operationalHour->close_time }}"
                    class="w-full border-gray-300 rounded-lg shadow-sm">
            </div>

            <!-- Submit -->
            <div class="flex justify-end space-x-3">
                <a href="{{ route('perangkat.operationalhours.index') }}"
                    class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600">
                    Batal
                </a>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const isClosedCheckbox = document.getElementById('is_closed');
            const openContainer = document.getElementById('open_time_container');
            const closeContainer = document.getElementById('close_time_container');
            const openInput = document.getElementById('open_time');
            const closeInput = document.getElementById('close_time');

            function toggleFields() {
                if (isClosedCheckbox.checked) {
                    openContainer.style.display = 'none';
                    closeContainer.style.display = 'none';
                    openInput.value = '';
                    closeInput.value = '';
                } else {
                    openContainer.style.display = 'block';
                    closeContainer.style.display = 'block';
                }
            }

            toggleFields();
            isClosedCheckbox.addEventListener('change', toggleFields);
        });
    </script>
@endsection