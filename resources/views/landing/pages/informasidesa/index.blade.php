@extends('landing.layout.app')

@section('page-title', 'Informasi Desa')

@section('landing_content')
    <main id="mainContent">
    <div id="beranda" class="page active">
        <!-- Hero Section -->
        @include('landing.pages.informasidesa.hero')
        <!-- Content Section -->
        @include('landing.pages.informasidesa.content')
    </div>
</main>
@endsection
