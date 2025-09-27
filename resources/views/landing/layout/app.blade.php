<!DOCTYPE html>
<html lang="id">

<head>
    <base href="{{ url('/') }}/">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('page-title') - DesaInovatif</title>
    <link rel="stylesheet" href="/css/landing.css">
    <link rel="stylesheet" href="/css/all.min.css">
    <link rel="stylesheet" href="/css/font.css">
</head>

<body>
    <!-- Header -->
    <header class="header">
        <!-- Top Bar -->
        @include('landing.partial.header')
        <!-- Main Header -->
        @include('landing.partial.navbar')
    </header>

    <!-- Main Content -->
    @yield('landing_content')

    @include('landing.partial.footer')
    <script src="{{ asset('js/landing.js') }}"></script>
</body>

</html>
