@extends('backend.index')

@section('page-title', 'Kelompok Jenis Anggaran')

@section('content')
<div class="max-w-5xl mx-auto bg-white p-8 rounded-2xl shadow-md">
    <div class="flex justify-between items-center border-b border-gray-200 pb-4 mb-6">
        <h2 class="text-2xl font-bold text-gray-700">Kelompok Jenis Anggaran</h2>
        <a href="{{ route('group_budget_types.create') }}"
            class="flex items-center gap-2 px-4 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition">
            Tambah Kelompok Jenis Anggaran
        </a>
    </div>

    @if(session('success'))
    <div class="mb-6 p-4 text-green-800 bg-green-100 rounded-lg border border-green-300">
        {{ session('success') }}
    </div>
    @endif

    @if($groupBudgetTypes->isEmpty())
    <div class="text-center py-12 text-gray-500">
        <p class="mb-4">Belum ada data kelompok jenis anggaran.</p>
    </div>
    @else
    <div class="space-y-4">
        @foreach($groupBudgetTypes as $group)
        <div class="p-4 bg-gray-50 rounded-lg border flex justify-between items-center">
            <div class="flex items-center space-x-4">
                @if($group->icon)
                <span class="text-2xl">{!! $group->icon !!}</span>
                @else
                <span class="text-2xl">📂</span>
                @endif
                <h3 class="text-lg font-semibold text-gray-700">{{ $group->name }}</h3>
            </div>
            <div class="flex space-x-2">
                <a href="{{ route('group_budget_types.edit', $group->id) }}"
                    class="px-3 py-1 bg-yellow-500 text-white rounded-lg shadow hover:bg-yellow-600">Edit</a>
                <form action="{{ route('group_budget_types.destroy', $group->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus kelompok jenis anggaran ini?')">
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
