@extends('backend.index')

@section('page-title', 'Tambah Profil Perangkat Desa')

@section('content')
<div class="max-w-5xl mx-auto bg-white p-8 rounded-2xl shadow-lg mt-8 transition-all duration-300">
    <h2 class="text-3xl font-bold text-gray-800 mb-6 border-b-2 pb-3 border-blue-100">Tambah Profil Perangkat</h2>

    {{-- ALERT --}}
    @if(session('success'))
    <div id="alert-success" class="mb-6 p-4 rounded-lg bg-green-50 text-green-700 border border-green-200 shadow-sm transition-opacity duration-500">
        {{ session('success') }}
    </div>
    @endif

    @if(session('error'))
    <div id="alert-error" class="mb-6 p-4 rounded-lg bg-red-50 text-red-700 border border-red-200 shadow-sm transition-opacity duration-500">
        {{ session('error') }}
    </div>
    @endif

    {{-- VALIDATION ERROR --}}
    @if ($errors->any())
    <div id="alert-validation" class="mb-6 p-4 rounded-lg bg-red-50 text-red-700 border border-red-200 shadow-sm transition-opacity duration-500">
        <ul class="list-disc list-inside space-y-1">
            @foreach ($errors->all() as $err)
            <li>{{ $err }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('perangkat.villageprofile.store') }}" method="POST" enctype="multipart/form-data"
        class="space-y-6">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-gray-700 font-medium mb-2">Nama</label>
                <input type="text" name="name" value="{{ old('name') }}"
                    class="w-full border border-gray-200 rounded-lg shadow-sm p-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 @error('name') border-red-500 @enderror">
                @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-2">NIK</label>
                <input type="text" name="nik" value="{{ old('nik') }}"
                    class="w-full border border-gray-200 rounded-lg shadow-sm p-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 @error('nik') border-red-500 @enderror">
                @error('nik')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div>
            <label class="block text-gray-700 font-medium mb-2">Jabatan</label>
            <select name="position_id" class="w-full border border-gray-200 rounded-lg shadow-sm p-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 @error('position_id') border-red-500 @enderror">
                <option value="">-- Pilih Jabatan --</option>
                @foreach($positions as $pos)
                <option value="{{ $pos->id }}" {{ old('position_id') == $pos->id ? 'selected' : '' }}>
                    {{ $pos->name }}
                </option>
                @endforeach
            </select>
            @error('position_id')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-gray-700 font-medium mb-2">Telepon</label>
                <input type="text" name="phone" value="{{ old('phone') }}"
                    class="w-full border border-gray-200 rounded-lg shadow-sm p-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 @error('phone') border-red-500 @enderror">
                @error('phone')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-2">Email</label>
                <input type="email" name="email" value="{{ old('email') }}"
                    class="w-full border border-gray-200 rounded-lg shadow-sm p-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 @error('email') border-red-500 @enderror">
                @error('email')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div>
            <label class="block text-gray-700 font-medium mb-2">Alamat</label>
            <textarea name="address" rows="4"
                class="w-full border border-gray-200 rounded-lg shadow-sm p-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 @error('address') border-red-500 @enderror">{{ old('address') }}</textarea>
            @error('address')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block text-gray-700 font-medium mb-2">Foto</label>
            <input type="file" name="photo" class="w-full border border-gray-200 rounded-lg shadow-sm p-3 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 transition duration-200 @error('photo') border-red-500 @enderror">
            @error('photo')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex justify-end space-x-4 mt-8">
            <a href="{{ route('perangkat.villageprofile.index') }}"
                class="px-6 py-3 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition duration-200">Batal</a>
            <button type="submit" class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-200">Simpan</button>
        </div>
    </form>
</div>

{{-- AUTO CLOSE ALERT --}}
<script>
    setTimeout(() => {
        document.querySelectorAll('#alert-success, #alert-error, #alert-validation').forEach(el => {
            el.classList.add('opacity-0');
            setTimeout(() => el.remove(), 500);
        });
    }, 4000);
</script>
@endsection
