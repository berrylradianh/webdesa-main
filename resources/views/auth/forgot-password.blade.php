<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Lupa Password</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-br from-blue-100 to-white min-h-screen flex items-center justify-center px-4">
    <div
        class="bg-white/90 shadow-2xl rounded-2xl w-full max-w-4xl grid grid-cols-1 md:grid-cols-2 overflow-hidden">

        <!-- Left Section (Sambutan) -->
        <div
            class="hidden md:flex flex-col items-center justify-center bg-gradient-to-br from-blue-600 to-indigo-700 text-white p-10">
            <h2 class="text-3xl font-bold mb-4">Lupa Password?</h2>
            <p class="text-center text-sm leading-relaxed max-w-sm">
                Jangan khawatir 😊  
                Masukkan email kamu, kami akan kirimkan link reset password ke inbox (cek juga folder spam ya).
            </p>
        </div>

        <!-- Right Section (Form) -->
        <div class="p-8 md:p-10 flex flex-col justify-center">
            <h1 class="text-2xl md:text-3xl font-bold text-gray-800 mb-6 text-center md:text-left">
                Reset Password 🔑
            </h1>

            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4 text-sm">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4 text-sm">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}" class="space-y-5">
                @csrf
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input type="email" id="email" name="email" required autofocus
                        class="w-full border border-gray-300 px-4 py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition shadow-sm" />
                </div>

                <button type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-md transition">
                    Kirim Link Reset
                </button>
            </form>

            <p class="mt-6 text-sm text-center text-gray-500">
                <a href="{{ route('login') }}" class="text-blue-600 hover:underline font-medium">Kembali ke Login</a>
            </p>
        </div>
    </div>
</body>

</html>
