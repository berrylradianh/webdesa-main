@extends('landing.layout.app')

@section('page-title', 'Layanan Online')

@section('landing_content')
<main id="mainContent">
    <div id="beranda" class="page active">
        @include('landing.pages.layananonline.hero')

        @include('landing.pages.layananonline.content')
    </div>
</main>
@endsection
