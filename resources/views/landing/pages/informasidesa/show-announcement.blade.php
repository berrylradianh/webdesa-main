@extends('landing.layout.app')

@section('page-title', 'Pengumuman')

@section('landing_content')
<div class="container" style="padding: 60px 0; text-align: justify;">
    <h1 style="color: #16a34a;">{{ $announcement->judul }}</h1>
    <p style="color: #666; font-size: 14px;">
        Kategori: {{ $announcement->category->name }} | Tanggal: {{ \Carbon\Carbon::parse($announcement->tanggal)->translatedFormat('d F Y') }}
    </p>
    <div style="color: #333; line-height: 1.8;">
        {!! $announcement->isi !!}
    </div>
    @if($announcement->lampiran)
    <p><a href="{{ asset('storage/' . $announcement->lampiran) }}" target="_blank" style="color: #16a34a;">Download Lampiran</a></p>
    @endif
    @if($announcement->link)
    <p><a href="{{ $announcement->link }}" target="_blank" style="color: #16a34a;">Link Terkait</a></p>
    @endif
</div>
@endsection
