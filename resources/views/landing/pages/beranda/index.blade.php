@extends('landing.layout.app')

@section('page-title', 'Beranda')

@section('landing_content')
<main id="mainContent">
    <div id="beranda" class="page active">
        <!-- Hero Section -->
        @include('landing.pages.beranda.hero')

        <!-- NIK Search Section -->
        @include('landing.pages.beranda.search')

        <!-- Statistics Section -->
        @include('landing.pages.beranda.statistic')

        <!-- Organization Structure Preview -->
        @include('landing.pages.beranda.organization')

        <!-- Upcoming Events -->
        @include('landing.pages.beranda.event')
    </div>
</main>
@endsection
