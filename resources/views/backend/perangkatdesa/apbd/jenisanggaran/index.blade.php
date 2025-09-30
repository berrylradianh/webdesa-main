@extends('backend.index')

@section('page-title', 'Jenis Anggaran Desa')

@section('content')
<div class="max-w-5xl mx-auto bg-white p-8 rounded-2xl shadow-md">
    <div class="flex justify-between items-center border-b border-gray-200 pb-4 mb-6">
        <h2 class="text-2xl font-bold text-gray-700">Jenis Anggaran Desa</h2>
        <a href="{{ route('budget_types.create') }}"
            class="flex items-center gap-2 px-4 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition">
            Tambah Jenis Anggaran
        </a>
    </div>

    @if(session('success'))
    <div class="mb-6 p-4 text-green-800 bg-green-100 rounded-lg border border-green-300">
        {{ session('success') }}
    </div>
    @endif

    @if($budgetTypes->isEmpty())
    <div class="text-center py-12 text-gray-500">
        <p class="mb-4">Belum ada data jenis anggaran.</p>
    </div>
    @else
    <div class="space-y-4">
        @foreach($budgetTypes as $type)
        <div class="p-4 bg-gray-50 rounded-lg border flex justify-between items-center">
            <div class="flex items-center space-x-4">
                @if($type->icon)
                <span class="text-2xl">{!! $type->icon !!}</span>
                @else
                <span class="text-2xl">📁</span>
                @endif
                <h3 class="text-lg font-semibold text-gray-700">{{ $type->name }}</h3>
            </div>
            <div class="flex space-x-2">
                <a href="{{ route('budget_types.edit', $type->id) }}"
                    class="px-3 py-1 bg-yellow-500 text-white rounded-lg shadow hover:bg-yellow-600">Edit</a>
                <form action="{{ route('budget_types.destroy', $type->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus jenis anggaran ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-3 py-1 bg-red-500 text-white rounded-lg shadow hover:bg-red-600">Hapus</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
    @endif
</div>
@endsection
