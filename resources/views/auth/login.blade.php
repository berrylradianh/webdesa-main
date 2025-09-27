<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
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
<!--
                <p class="mt-6 text-sm text-center text-gray-500">
                    Belum punya akun?
                    <a href="{{ route('register') }}" class="text-blue-600 hover:underline font-medium">Daftar</a>
                </p> -->
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

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const togglePassword = document.querySelector("#togglePassword");
        const password = document.querySelector("#password");
        const eyeOpen = document.querySelector("#eyeOpen");
        const eyeClosed = document.querySelector("#eyeClosed");

        if (togglePassword && password && eyeOpen && eyeClosed) {
            togglePassword.addEventListener("click", function() {
                const type =
                    password.getAttribute("type") === "password" ?
                    "text" :
                    "password";
                password.setAttribute("type", type);

                // Toggle icon
                eyeOpen.classList.toggle("hidden");
                eyeClosed.classList.toggle("hidden");
            });
        }
    });
</script>

<style>
    /* Styling input umum */
    .form-input {
        width: 100%;
        border: 1px solid #d1d5db;
        /* gray-300 */
        padding: 0.5rem 1rem;
        /* py-2 px-4 */
        border-radius: 0.375rem;
        /* rounded-md */
        outline: none;
        box-shadow: 0 1px 2px rgb(0 0 0 / 0.05);
        transition: box-shadow 0.2s ease, border-color 0.2s ease;
    }

    .form-input:focus {
        border-color: #3b82f6;
        /* blue-500 */
        box-shadow: 0 0 0 2px rgb(59 130 246 / 0.5);
    }

    /* Password input padding kanan agar ada ruang tombol toggle */
    .password-input {
        padding-right: 2.5rem;
        /* ruang tombol icon */
    }

    /* Posisi tombol toggle password */
    .password-wrapper {
        position: relative;
    }

    .toggle-password-btn {
        position: absolute;
        top: 70%;
        right: 0.75rem;
        transform: translateY(-50%);
        background: transparent;
        border: none;
        cursor: pointer;
        color: #6b7280;
        padding: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100%;
    }

    .toggle-password-btn:hover,
    .toggle-password-btn:focus {
        color: #374151;
        outline: none;
    }

    .icon-eye {
        width: 1.25rem;
        height: 1.25rem;
    }

    .alert {
        padding: 0.75rem 1rem;
        border-radius: 0.375rem;
        margin-bottom: 1rem;
        font-size: 0.875rem;
    }

    .alert-error {
        background-color: #fee2e2;
        border: 1px solid #fca5a5;
        color: #b91c1c;
    }

    .alert-success {
        background-color: #d1fae5;
        border: 1px solid #6ee7b7;
        color: #047857;
    }

    /* Button submit */
    .btn-submit {
        width: 100%;
        background-color: #2563eb;
        color: white;
        font-weight: 600;
        padding: 0.5rem 1rem;
        border-radius: 0.375rem;
        transition: background-color 0.15s ease-in-out;
        border: none;
        cursor: pointer;
    }

    .btn-submit:hover {
        background-color: #1d4ed8;
    }
</style>

</html>
