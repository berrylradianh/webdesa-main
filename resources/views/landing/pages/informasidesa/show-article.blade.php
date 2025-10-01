@extends('landing.layout.app')

@section('page-title', 'Artikel')

@section('landing_content')
<div class="container" style="padding: 60px 0; text-align: justify;">
    <h1 style="color: #16a34a;">{{ $article->judul }}</h1>
    <p style="color: #666; font-size: 14px;">{{ \Carbon\Carbon::parse($article->created_at)->translatedFormat('d F Y') }}</p>
    @if($article->gambar)
    <img src="{{ asset('storage/' . $article->gambar) }}" alt="{{ $article->judul }}" style="max-width: 100%; margin-bottom: 20px;">
    @endif
    <div style="color: #333; line-height: 1.8;">
        {!! $article->konten !!}
    </div>
</div>
@endsection
