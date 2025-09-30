@extends('landing.layout.app')

@section('page-title', 'Peta Potensi')

@section('landing_content')
    <main id="mainContent">
        <div id="beranda" class="page active">
            <!-- Hero Section -->
            @include('landing.pages.petapotensi.hero')
            <!-- Content Section -->
            @include('landing.pages.petapotensi.content')
        </div>
    </main>
@endsection
