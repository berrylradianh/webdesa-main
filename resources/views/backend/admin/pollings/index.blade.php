@extends('backend.index')

@section('page-title', 'Daftar Polling')

@section('content')
    <div class="space-y-6">
        <div class="bg-white rounded-2xl shadow-lg border border-gray-200 p-6">

            <!-- Header -->
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-gray-800 flex items-center gap-2">
                    Daftar Polling
                </h2>
                <a href="{{ route('polling.create') }}"
                    class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg shadow">
                    + Tambah Polling
                </a>
            </div>

            <!-- Alert -->
            @if(session('success'))
                <div class="p-4 mb-6 bg-green-100 text-green-800 rounded-lg border border-green-300 shadow-sm">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Grid Layout -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @forelse($pollings as $polling)
                    @php
                        // Total suara dihitung dari jumlah jawaban pada semua opsi
                        $totalVotes = $polling->options->sum(fn($opt) => $opt->answers->count());
                    @endphp

                    <!-- Card Polling -->
                    <div class="bg-gray-50 rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                        <!-- Header -->
                        <div class="px-4 py-3 flex justify-between items-center border-b bg-gray-100">
                            <h3 class="font-semibold text-gray-800">{{ $polling->title }}</h3>
                            <div class="space-x-2">
                                <a href="{{ route('polling.edit', $polling->id) }}"
                                    class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded text-sm">Edit</a>
                                <form action="{{ route('polling.destroy', $polling->id) }}" method="POST" class="inline-block"
                                    onsubmit="return confirm('Yakin hapus polling ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-sm">Hapus</button>
                                </form>
                            </div>
                        </div>

                        <!-- Body -->
                        <div class="p-4 space-y-3">
                            @foreach($polling->options as $option)
                                @php
                                    $voteCount = $option->answers->count();
                                    $percent = $totalVotes ? round(($voteCount / $totalVotes) * 100, 2) : 0;
                                @endphp
                                <div>
                                    <div class="flex justify-between mb-1 text-sm">
                                        <span class="font-medium text-gray-700">{{ $option->option_text }}</span>
                                        <span class="text-gray-600">{{ $voteCount }} suara ({{ $percent }}%)</span>
                                    </div>
                                    <div class="w-full bg-gray-200 rounded-full h-2">
                                        <div class="bg-green-500 h-2 rounded-full" style="width: {{ $percent }}%"></div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Footer -->
                        <div class="px-4 py-2 bg-gray-100 text-sm text-gray-600 border-t">
                            Total Suara: <span class="font-semibold">{{ $totalVotes }}</span>
                        </div>
                    </div>
                @empty
                    <p class="col-span-2 text-center text-gray-500 italic">Belum ada polling tersedia</p>
                @endforelse
            </div>
        </div>
    </div>
@endsection