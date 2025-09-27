@extends('backend.index')

@section('page-title', 'Edit Profil Perangkat Desa')

@section('content')
    <div class="max-w-4xl mx-auto bg-white p-6 rounded-xl shadow-md">
        <h2 class="text-2xl font-bold text-gray-700 mb-6 border-b pb-2">Edit Profil Perangkat</h2>

        {{-- ALERT --}}
        @if(session('success'))
            <div id="alert-success" class="mb-4 p-4 rounded-lg bg-green-100 text-green-800 border border-green-300">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div id="alert-error" class="mb-4 p-4 rounded-lg bg-red-100 text-red-800 border border-red-300">
                {{ session('error') }}
            </div>
        @endif

        {{-- VALIDATION ERROR --}}
        @if ($errors->any())
            <div id="alert-validation" class="mb-4 p-4 rounded-lg bg-red-100 text-red-800 border border-red-300">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('perangkat.villageprofile.update', $profile->id) }}" method="POST" enctype="multipart/form-data"
            class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-gray-700 font-semibold mb-2">Nama</label>
                <input type="text" name="name" value="{{ old('name', $profile->name) }}"
                    class="w-full border-gray-300 rounded-lg shadow-sm">
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-2">Nik</label>
                <input type="text" name="nik" value="{{ old('nik', $profile->nik) }}"
                    class="w-full border-gray-300 rounded-lg shadow-sm">
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-2">Jabatan</label>
                <select name="position_id" class="w-full border-gray-300 rounded-lg shadow-sm">
                    <option value="">-- Pilih Jabatan --</option>
                    @foreach($positions as $pos)
                        <option value="{{ $pos->id }}" {{ old('position_id', $profile->position_id) == $pos->id ? 'selected' : '' }}>
                            {{ $pos->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-2">Telepon</label>
                <input type="text" name="phone" value="{{ old('phone', $profile->phone) }}"
                    class="w-full border-gray-300 rounded-lg shadow-sm">
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-2">Email</label>
                <input type="email" name="email" value="{{ old('email', $profile->email) }}"
                    class="w-full border-gray-300 rounded-lg shadow-sm">
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-2">Alamat</label>
                <textarea name="address" rows="3" class="w-full border-gray-300 rounded-lg shadow-sm">{{ old('address', $profile->address) }}</textarea>
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-2">Foto</label>
                @if($profile->photo)
                    <img src="{{ asset('storage/' . $profile->photo) }}" alt="Foto" class="h-20 mb-2 rounded">
                @endif
                <input type="file" name="photo" class="w-full border-gray-300 rounded-lg shadow-sm">
            </div>

            <div class="flex justify-end space-x-3">
                <a href="{{ route('perangkat.villageprofile.index') }}"
                    class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600">Batal</a>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Update</button>
            </div>
        </form>
    </div>

    {{-- AUTO CLOSE ALERT --}}
    <script>
        setTimeout(() => {
            document.querySelectorAll('#alert-success, #alert-error, #alert-validation').forEach(el => el.remove());
        }, 4000);
    </script>
@endsection
