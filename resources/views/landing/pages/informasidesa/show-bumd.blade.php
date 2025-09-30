@extends('landing.layout.app')

@section('page-title', 'Artikel')

@section('landing_content')
<div class="container" style="padding: 60px 0;">
    <h1 style="color: #16a34a;">{{ $bumd->name }}</h1>
    <p style="color: #666; font-size: 14px;">Jenis: {{ $bumd->type }}</p>
    @if($bumd->address)
        <p style="color: #666;">Alamat: {!! nl2br(e($bumd->address)) !!}</p>
    @endif
    @if($bumd->contact)
        <p style="color: #666;">Kontak: {{ $bumd->contact }}</p>
    @endif
    @if($bumd->establishment_date)
        <p style="color: #666;">Tanggal Berdiri: {{ \Carbon\Carbon::parse($bumd->establishment_date)->translatedFormat('d F Y') }}</p>
    @endif
    <div style="color: #333; line-height: 1.8;">
        {!! $bumd->description !!}
    </div>
    @if($bumd->capital)
        <p style="color: #666;">Modal: Rp {{ number_format($bumd->capital, 2, ',', '.') }}</p>
    @endif
</div>
@endsection
