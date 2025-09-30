@extends('backend.index')

@section('page-title', 'Tambah Data APBD')

@section('content')
<div class="max-w-4xl mx-auto bg-white p-8 rounded-2xl shadow-lg mt-8">
    <h2 class="text-3xl font-bold text-gray-800 mb-6 border-b-2 border-gray-200 pb-3">Tambah Data APBD</h2>

    <form action="{{ route('apbds.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Tahun</label>
            <select name="year" required
                class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('year') border-red-500 @enderror transition duration-150">
                <option value="">-- Pilih Tahun --</option>
                @foreach($years as $y)
                <option value="{{ $y }}" {{ old('year') == $y ? 'selected' : '' }}>{{ $y }}</option>
                @endforeach
            </select>
            @error('year')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Jenis Anggaran</label>
            <select name="budget_type_id" id="budget_type_id" required
                class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('budget_type_id') border-red-500 @enderror transition duration-150">
                <option value="">-- Pilih Jenis Anggaran --</option>
                @foreach($budgetTypes as $type)
                <option value="{{ $type->id }}" {{ old('budget_type_id') == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
                @endforeach
            </select>
            @error('budget_type_id')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Detail Jenis Anggaran</label>
            <select name="detail_budget_type_id" id="detail_budget_type_id" required
                class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('detail_budget_type_id') border-red-500 @enderror transition duration-150" disabled>
                <option value="">-- Pilih Detail Jenis Anggaran --</option>
            </select>
            @error('detail_budget_type_id')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Nilai Anggaran (Rp)</label>
                <input type="number" name="budget_value" value="{{ old('budget_value') }}" min="0" step="0.01" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('budget_value') border-red-500 @enderror transition duration-150">
                @error('budget_value')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Nilai Realisasi (Rp)</label>
                <input type="number" name="realization_value" value="{{ old('realization_value') }}" min="0" step="0.01" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('realization_value') border-red-500 @enderror transition duration-150">
                @error('realization_value')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Bukti Pelaksanaan (Multiple Images)</label>
            <input type="file" name="evidence_images[]" multiple accept="image/*"
                class="w-full border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('evidence_images') border-red-500 @enderror transition duration-150">
            @error('evidence_images')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
            @error('evidence_images.*')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Keterangan</label>
            <textarea name="description" rows="3"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('description') border-red-500 @enderror transition duration-150">{{ old('description') }}</textarea>
            @error('description')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex justify-end space-x-4 mt-8">
            <a href="{{ route('apbds.index') }}"
                class="px-6 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition duration-150">Batal</a>
            <button type="submit"
                class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-150">Simpan</button>
        </div>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const budgetTypeSelect = document.getElementById('budget_type_id');
        const detailBudgetTypeSelect = document.getElementById('detail_budget_type_id');

        // Get the old input value for budget_type_id from the select element
        const oldBudgetTypeId = budgetTypeSelect.value;

        budgetTypeSelect.addEventListener('change', function() {
            const budgetTypeId = this.value;
            detailBudgetTypeSelect.innerHTML = '<option value="">Memuat...</option>';
            detailBudgetTypeSelect.disabled = true;

            if (!budgetTypeId) {
                detailBudgetTypeSelect.innerHTML = '<option value="">-- Pilih Detail Jenis Anggaran --</option>';
                detailBudgetTypeSelect.disabled = true;
                return;
            }

            fetch(`/apbds/detail-budget-types/${budgetTypeId}`)
                .then(response => response.json())
                .then(data => {
                    detailBudgetTypeSelect.innerHTML = '<option value="">-- Pilih Detail Jenis Anggaran --</option>';
                    data.forEach(item => {
                        const option = document.createElement('option');
                        option.value = item.id;
                        option.textContent = item.name;
                        detailBudgetTypeSelect.appendChild(option);
                    });
                    detailBudgetTypeSelect.disabled = false;
                })
                .catch(() => {
                    detailBudgetTypeSelect.innerHTML = '<option value="">Gagal memuat data</option>';
                    detailBudgetTypeSelect.disabled = true;
                });
        });

        // Trigger change event if there is an old budget_type_id value
        if (oldBudgetTypeId) {
            budgetTypeSelect.dispatchEvent(new Event('change'));
        }
    });
</script>
@endsection
