<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet" />
    <title>@yield('page-title') - DesaInovatif</title>
    <style>
        .sidebar {
            position: sticky;
            top: 0;
            height: 100vh;
        }

        .main-content {
            overflow-y: auto;
            height: 100vh;
        }
    </style>
</head>

<body class="bg-gray-100 font-sans flex min-h-screen">
    <!-- Sidebar -->
    <aside class="sidebar w-64 bg-gradient-to-b from-[#3EB489] to-[#007BFF] text-white flex flex-col shadow-xl">
        @include('backend.partial.sidebar')
    </aside>

    <!-- Main Content -->
    <div class="main-content flex-1 flex flex-col">
        <!-- Topbar -->
        @include('backend.partial.topbar')

        <!-- Content -->
        <main class="flex-1 p-6">
            @yield('content')
        </main>

        <!-- Footer -->
        @include('backend.partial.footer')
    </div>

    <script>
        feather.replace();
    </script>
</body>

</html>
