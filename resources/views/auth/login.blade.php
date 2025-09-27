<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="{{ asset('js/show-password.js') }}" defer></script>
    <link rel="stylesheet" href="{{ asset('css/login-register.css') }}" />
</head>

<body class="bg-gradient-to-br from-blue-100 to-white min-h-screen flex">
    <div class="flex flex-col md:flex-row w-full">
        <!-- Left side (form login) -->
        <div class="flex w-full md:w-1/2 items-center justify-center p-6 md:p-10">
            <div class="w-full max-w-md bg-white/90 shadow-2xl rounded-2xl p-8 md:p-10">
                <h1 class="text-2xl md:text-3xl font-bold text-center text-gray-800 mb-6">
                    Login Akun
                </h1>

                <!-- Error Message -->
                @if (session('error'))
                    <div class="alert alert-error">{{ session('error') }}</div>
                @endif

                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <!-- Login Form -->
                <form method="POST" action="{{ route('login') }}" class="space-y-5" novalidate>
                    @csrf
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus
                            class="form-input" />
                    </div>

                    <div class="relative password-wrapper">
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                        <input type="password" id="password" name="password" required value="DesaInovatif121!"
                            class="form-input password-input" />

                        <button type="button" id="togglePassword" aria-label="Toggle password visibility"
                            class="toggle-password-btn">
                            <!-- Eye Open -->
                            <svg id="eyeOpen" xmlns="http://www.w3.org/2000/svg" class="icon-eye" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 
                                    12 5c4.477 0 8.268 2.943 
                                    9.542 7-1.274 4.057-5.065 
                                    7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 
                                    3 3 0 016 0z" />
                            </svg>
                            <!-- Eye Closed -->
                            <svg id="eyeClosed" xmlns="http://www.w3.org/2000/svg" class="icon-eye hidden" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 3l18 18M9.88 9.88a3 3 
                                    0 004.24 4.24" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M10.73 5.08A10.45 10.45 
                                    0 0112 5c5.25 0 9.52 3.52 
                                    10.77 7.5a10.46 10.46 0 
                                    01-1.56 3.26M6.1 6.1A10.46 
                                    10.46 0 001.23 12.5c1.25 
                                    3.98 5.52 7.5 10.77 7.5 
                                    1.03 0 2.02-.15 2.95-.42" />
                            </svg>
                        </button>
                    </div>

                    <div class="flex justify-between items-center text-sm">
                        <label class="inline-flex items-center text-gray-600">
                            <a href="{{ route('password.request') }}" class="text-blue-600 hover:underline">Lupa
                                Password?</a>
                        </label>
                    </div>

                    <button type="submit" class="btn-submit">Login</button>
                </form>

                <p class="mt-6 text-sm text-center text-gray-500">
                    Belum punya akun?
                    <a href="{{ route('register') }}" class="text-blue-600 hover:underline font-medium">Daftar</a>
                </p>
            </div>
        </div>

        <!-- Right side (sambutan) -->
        <div class="hidden md:flex md:w-1/2 bg-blue-600 text-white items-center justify-center p-10">
            <div class="max-w-md text-center">
                <h1 class="text-4xl font-bold mb-4">Halo, Selamat Datang Kembali! 👋</h1>
                <p class="text-lg leading-relaxed">
                    Masuk dengan akun Anda dan nikmati layanan sesuai dengan peran Anda di sistem kami.
                </p>
            </div>
        </div>
    </div>
</body>

</html>