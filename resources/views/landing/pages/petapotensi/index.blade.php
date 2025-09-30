@extends('landing.layout.app')

@section('page-title', 'Peta Potensi')

@section('landing_content')
    <main id="mainContent">
        <div id="beranda" class="page active">
            <!-- Content Section -->
            @include('landing.pages.petapotensi.content')
        </div>
    </main>
@endsection
