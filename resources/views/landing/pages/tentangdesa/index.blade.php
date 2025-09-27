@extends('landing.layout.app')

@section('page-title', 'Tentang Desa')

@section('landing_content')
<main id="mainContent">
    <div id="beranda" class="page active">
        @include('landing.pages.tentangdesa.hero')

        @include('landing.pages.tentangdesa.content')
    </div>
</main>
@endsection
