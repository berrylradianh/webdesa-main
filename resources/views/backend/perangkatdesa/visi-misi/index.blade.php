@extends('backend.index')

@section('page-title', 'Visi & Misi Desa')

@section('content')
    <div class="max-w-4xl mx-auto bg-white p-6 rounded-xl shadow-lg border border-gray-200">
        {{-- Header --}}
        <div class="mb-6">
            <h2 class="text-2xl font-bold text-gray-700">Visi & Misi Desa</h2>
        </div>

        {{-- Alert Success --}}
        @if(session('success'))
            <div class="mb-6 p-4 bg-green-50 border-l-4 border-green-500 text-green-800 rounded-r-lg">
                <div class="flex items-center">
                    <span class="font-medium">{{ session('success') }}</span>
                </div>
            </div>
        @endif

        @if($visiMisi)
            {{-- Section Visi --}}
            <div class="mb-8 p-4 bg-gray-50 rounded-lg border border-gray-200">
                <h3 class="text-xl font-semibold text-gray-800 mb-3 border-b border-gray-300 pb-2">Visi Desa</h3>
                <div class="text-gray-700 leading-relaxed">
                    {!! nl2br(e($visiMisi->visi)) !!}
                </div>
                @if($visiMisi->user)
                    <p class="text-sm text-gray-500 mt-2">Dibuat oleh: {{ $visiMisi->user->name }} pada
                        {{ $visiMisi->created_at->format('d M Y') }}
                    </p>
                @endif
            </div>

            {{-- Section Misi --}}
            <div class="mb-8 p-4 bg-blue-50 rounded-lg border border-blue-200">
                <h3 class="text-xl font-semibold text-gray-800 mb-3 border-b border-blue-300 pb-2">Misi Desa</h3>
                @if($visiMisi->misi->count() > 0)
                    <ol class="list-decimal pl-6 space-y-2 text-gray-700 leading-relaxed">
                        @foreach($visiMisi->misi as $item)
                            <li class="text-base">{!! nl2br(e($item->misi)) !!}</li>
                        @endforeach
                    </ol>
                @else
                    <p class="text-gray-600 italic">Belum ada misi yang ditambahkan.</p>
                @endif
            </div>

            {{-- Footer Aksi --}}
            <div class="flex justify-end space-x-3 pt-4 border-t border-gray-200">
                <a href="{{ route('perangkat.visi-misi.edit', $visiMisi) }}"
                    class="px-6 py-2 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition-colors duration-200 shadow-sm">
                    Edit Visi & Misi
                </a>
                <form action="{{ route('perangkat.visi-misi.destroy', $visiMisi) }}" method="POST"
                    onsubmit="return confirm('Yakin ingin menghapus Visi & Misi ini? Data tidak bisa dikembalikan.')"
                    class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="px-6 py-2 bg-red-600 text-white font-medium rounded-lg hover:bg-red-700 transition-colors duration-200 shadow-sm">
                        Hapus
                    </button>
                </form>
            </div>

        @else
            {{-- Empty State --}}
            <div class="text-center py-12">
                <div class="mb-6">
                    <h3 class="text-xl font-semibold text-gray-600 mb-2">Belum Ada Data Visi & Misi</h3>
                    <p class="text-gray-500">Mulai dengan menambahkan visi dan misi desa untuk panduan pembangunan.</p>
                </div>
                <a href="{{ route('perangkat.visi-misi.create') }}"
                    class="inline-block px-8 py-3 bg-green-600 text-white font-medium rounded-lg hover:bg-green-700 transition-colors duration-200 shadow-md">
                    Tambah Visi & Misi Pertama
                </a>
            </div>
        @endif
    </div>
@endsection
