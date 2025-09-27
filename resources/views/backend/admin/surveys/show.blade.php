@extends('backend.index')

@section('page-title', 'Detail Survei')

@section('content')
    <div class="p-6 bg-white rounded-xl shadow-md">
        <h2 class="text-2xl font-bold mb-6 text-gray-800">{{ $survey->judul }}</h2>
        <p class="mb-4">{{ $survey->deskripsi }}</p>

        <h3 class="font-semibold text-lg mb-3">Daftar Pertanyaan</h3>
        <div class="space-y-6">
            @forelse($survey->questions as $question)
                <div class="p-4 border rounded-lg">
                    <p class="font-semibold">{{ $question->pertanyaan }} <span
                            class="text-sm text-gray-500">({{ $question->tipe }})</span></p>

                    @if($question->tipe === 'pilihan')
                        <ul class="mt-2 space-y-1">
                            @php
                                $totalAnswers = $question->answers->count();
                            @endphp
                            @foreach($question->options as $option)
                                @php
                                    $count = $option->answers->count();
                                    $percent = $totalAnswers > 0 ? round(($count / $totalAnswers) * 100, 1) : 0;
                                @endphp
                                <li class="flex items-center justify-between">
                                    <span>{{ $option->opsi }}</span>
                                    <span class="text-sm text-gray-600">{{ $count }} jawaban ({{ $percent }}%)</span>
                                </li>
                            @endforeach
                        </ul>
                    @elseif($question->tipe === 'skala')
                        @php
                            $totalAnswers = $question->answers->count();
                            $avg = $totalAnswers > 0 ? round($question->answers->avg('nilai'), 2) : 0;
                        @endphp
                        <p class="mt-2 text-sm text-gray-600">Rata-rata nilai: <strong>{{ $avg }}</strong> dari 5
                            ({{ $totalAnswers }} jawaban)</p>
                    @endif
                </div>
            @empty
                <p class="text-gray-500">Belum ada pertanyaan.</p>
            @endforelse
        </div>
    </div>
@endsection