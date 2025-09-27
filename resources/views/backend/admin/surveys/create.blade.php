@extends('backend.index')

@section('page-title', 'Buat Survei Baru')

@section('content')
    <div class="p-6 bg-white rounded-xl shadow-md max-w-4xl mx-auto">
        <h2 class="text-2xl font-bold mb-6 text-gray-800">Buat Survei Baru</h2>

        <form action="{{ route('surveys.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block font-medium">Judul</label>
                <input type="text" name="judul" value="{{ old('judul') }}" class="w-full p-2 border rounded-lg" required>
            </div>

            <div>
                <label class="block font-medium">Deskripsi</label>
                <textarea name="deskripsi" rows="3" class="w-full p-2 border rounded-lg">{{ old('deskripsi') }}</textarea>
            </div>

            <hr class="my-4">

            <h3 class="font-semibold text-lg">Pertanyaan</h3>
            <div id="questions-container" class="space-y-6">
                <div class="question-item border p-4 rounded-lg bg-gray-50">
                    <label class="block font-medium">Pertanyaan</label>
                    <input type="text" name="pertanyaan[]" class="w-full p-2 border rounded-lg mb-2" required>

                    <label class="block font-medium">Tipe</label>
                    <select name="tipe[]" class="w-full p-2 border rounded-lg tipe-select">
                        <option value="pilihan">Pilihan Ganda</option>
                        <option value="skala">Skala (1-5)</option>
                    </select>

                    <div class="opsi-container mt-2">
                        <label class="block font-medium">Opsi Jawaban</label>
                        <div class="opsi-list space-y-2">
                            <div class="flex gap-2 opsi-item">
                                <input type="text" name="opsi[0][]" class="flex-1 p-2 border rounded-lg"
                                    placeholder="Opsi 1">
                                <button type="button" class="remove-opsi px-3 bg-red-500 text-white rounded-lg">x</button>
                            </div>
                        </div>
                        <button type="button" class="add-opsi mt-2 px-3 py-1 bg-blue-600 text-white rounded-lg">+ Tambah
                            Opsi</button>
                    </div>
                </div>
            </div>

            <button type="button" id="add-question" class="px-4 py-2 bg-gray-700 text-white rounded-lg">+ Tambah
                Pertanyaan</button>

            <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-lg">Simpan Survei</button>
        </form>
    </div>

    <script>
        let questionIndex = 1;

        // tambah pertanyaan baru
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
                        <div class="opsi-list space-y-2">
                            <div class="flex gap-2 opsi-item">
                                <input type="text" name="opsi[${questionIndex}][]" class="flex-1 p-2 border rounded-lg" placeholder="Opsi 1">
                                <button type="button" class="remove-opsi px-3 bg-red-500 text-white rounded-lg">x</button>
                            </div>
                        </div>
                        <button type="button" class="add-opsi mt-2 px-3 py-1 bg-blue-600 text-white rounded-lg">+ Tambah Opsi</button>
                    </div>
                `;
            container.appendChild(newQuestion);

            initHandlers(newQuestion, questionIndex);

            questionIndex++;
        });

        // fungsi untuk inisialisasi event handler di setiap pertanyaan
        function initHandlers(questionItem, index) {
            const tipeSelect = questionItem.querySelector('.tipe-select');
            const opsiContainer = questionItem.querySelector('.opsi-container');
            const opsiList = questionItem.querySelector('.opsi-list');
            const addOpsiBtn = questionItem.querySelector('.add-opsi');

            // toggle opsi kalau tipe = skala
            tipeSelect.addEventListener('change', function () {
                opsiContainer.style.display = this.value === 'pilihan' ? 'block' : 'none';
            });

            // tambah opsi
            addOpsiBtn.addEventListener('click', function () {
                const opsiItem = document.createElement('div');
                opsiItem.classList.add('flex', 'gap-2', 'opsi-item');
                opsiItem.innerHTML = `
                        <input type="text" name="opsi[${index}][]" class="flex-1 p-2 border rounded-lg" placeholder="Opsi baru">
                        <button type="button" class="remove-opsi px-3 bg-red-500 text-white rounded-lg">x</button>
                    `;
                opsiList.appendChild(opsiItem);

                // hapus opsi
                opsiItem.querySelector('.remove-opsi').addEventListener('click', function () {
                    opsiItem.remove();
                });
            });

            // handler hapus opsi default
            opsiList.querySelectorAll('.remove-opsi').forEach(btn => {
                btn.addEventListener('click', function () {
                    btn.closest('.opsi-item').remove();
                });
            });
        }

        // init pertanyaan pertama
        initHandlers(document.querySelector('.question-item'), 0);
    </script>
@endsection