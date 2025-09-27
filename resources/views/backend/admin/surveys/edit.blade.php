@extends('backend.index')

@section('page-title', 'Edit Survei')

@section('content')
    <div class="p-6 bg-white rounded-xl shadow-md max-w-4xl mx-auto">
        <h2 class="text-2xl font-bold mb-6 text-gray-800">Edit Survei</h2>

        <form action="{{ route('surveys.update', $survey->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block font-medium">Judul</label>
                <input type="text" name="judul" value="{{ old('judul', $survey->judul) }}"
                    class="w-full p-2 border rounded-lg" required>
            </div>

            <div>
                <label class="block font-medium">Deskripsi</label>
                <textarea name="deskripsi" rows="3"
                    class="w-full p-2 border rounded-lg">{{ old('deskripsi', $survey->deskripsi) }}</textarea>
            </div>

            <hr class="my-4">

            <h3 class="font-semibold text-lg">Pertanyaan</h3>
            <div id="questions-container" class="space-y-6">
                @foreach($survey->questions as $qIndex => $question)
                    <div class="question-item border p-4 rounded-lg bg-gray-50">
                        <label class="block font-medium">Pertanyaan</label>
                        <input type="text" name="pertanyaan[]" value="{{ $question->pertanyaan }}"
                            class="w-full p-2 border rounded-lg mb-2" required>

                        <label class="block font-medium">Tipe</label>
                        <select name="tipe[]" class="w-full p-2 border rounded-lg tipe-select">
                            <option value="pilihan" {{ $question->tipe == 'pilihan' ? 'selected' : '' }}>Pilihan Ganda</option>
                            <option value="skala" {{ $question->tipe == 'skala' ? 'selected' : '' }}>Skala (1-5)</option>
                        </select>

                        <div class="opsi-container mt-2" style="{{ $question->tipe === 'pilihan' ? '' : 'display:none;' }}">
                            <label class="block font-medium">Opsi Jawaban</label>
                            @foreach($question->options as $option)
                                <input type="text" name="opsi[{{ $qIndex }}][]" value="{{ $option->opsi }}"
                                    class="w-full p-2 border rounded-lg mb-2">
                            @endforeach
                            <button type="button" class="add-option px-2 py-1 bg-blue-500 text-white rounded">+ Tambah
                                Opsi</button>
                        </div>
                    </div>
                @endforeach
            </div>

            <button type="button" id="add-question" class="px-4 py-2 bg-gray-700 text-white rounded-lg">+ Tambah
                Pertanyaan</button>

            <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-lg">Simpan Perubahan</button>
        </form>
    </div>

    <script>
        let questionIndex = {{ count($survey->questions) }};

        document.getElementById('add-question').addEventListener('click', function () {
            const container = document.getElementById('questions-container');
            const newQuestion = document.createElement('div');
            newQuestion.classList.add('question-item', 'border', 'p-4', 'rounded-lg', 'bg-gray-50');
            newQuestion.innerHTML = `
                <label class="block font-medium">Pertanyaan</label>
                <input type="text" name="pertanyaan[]" class="w-full p-2 border rounded-lg mb-2" required>

                <label class="block font-medium">Tipe</label>
                <select name="tipe[]" class="w-full p-2 border rounded-lg tipe-select">
                    <option value="pilihan">Pilihan Ganda</option>
                    <option value="skala">Skala (1-5)</option>
                </select>

                <div class="opsi-container mt-2">
                    <label class="block font-medium">Opsi Jawaban</label>
                    <input type="text" name="opsi[${questionIndex}][]" class="w-full p-2 border rounded-lg mb-2" placeholder="Opsi 1">
                    <input type="text" name="opsi[${questionIndex}][]" class="w-full p-2 border rounded-lg mb-2" placeholder="Opsi 2">
                    <button type="button" class="add-option px-2 py-1 bg-blue-500 text-white rounded">+ Tambah Opsi</button>
                </div>
            `;
            container.appendChild(newQuestion);

            newQuestion.querySelector('.tipe-select').addEventListener('change', function () {
                const opsiContainer = newQuestion.querySelector('.opsi-container');
                opsiContainer.style.display = this.value === 'pilihan' ? 'block' : 'none';
            });

            questionIndex++;
        });

        // Add opsi dinamis
        document.addEventListener('click', function (e) {
            if (e.target.classList.contains('add-option')) {
                const opsiContainer = e.target.closest('.opsi-container');
                const input = document.createElement('input');
                input.type = 'text';
                input.name = opsiContainer.querySelector('input').name;
                input.classList.add('w-full', 'p-2', 'border', 'rounded-lg', 'mb-2');
                input.placeholder = 'Opsi tambahan';
                opsiContainer.insertBefore(input, e.target);
            }
        });
    </script>
@endsection