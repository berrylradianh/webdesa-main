@extends('landing.layout.app')

@section('page-title', 'Aspirasi & Partisipasi')

@section('landing_content')
    <main id="mainContent">
        <div id="beranda" class="page active">
            <!-- Hero Section -->
            @include('landing.pages.aspirasipartisipasi.hero')
            <!-- Content Section -->
            @include('landing.pages.aspirasipartisipasi.content')
        </div>
    </main>
@endsection
