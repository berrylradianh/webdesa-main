@extends('landing.layout.app')

@section('page-title', 'Agenda')

@section('landing_content')
<div class="container" style="padding: 60px 0;">
    <h1 style="color: #16a34a;">{{ $agenda->judul }}</h1>
    <p style="color: #666; font-size: 14px;">
        Tanggal Mulai: {{ \Carbon\Carbon::parse($agenda->tanggal_mulai)->translatedFormat('d F Y') }}
        @if($agenda->tanggal_selesai)
            - Selesai: {{ \Carbon\Carbon::parse($agenda->tanggal_selesai)->translatedFormat('d F Y') }}
        @endif
    </p>
    @if($agenda->lokasi)
        <p style="color: #666;">Lokasi: {{ $agenda->lokasi }}</p>
    @endif
    <div style="color: #333; line-height: 1.8;">
        {!! $agenda->deskripsi !!}
    </div>
</div>
@endsection
