<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-br from-green-100 to-white min-h-screen flex items-center justify-center px-4">
    <div class="bg-white shadow-2xl rounded-2xl w-full max-w-md p-8 md:p-10">
        <h1 class="text-2xl font-bold text-center text-gray-800 mb-6">Reset Password</h1>

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4 text-sm">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('password.update') }}" class="space-y-5">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required
                    class="w-full border border-gray-300 px-4 py-2 rounded-md focus:ring-2 focus:ring-green-500" />
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password Baru</label>
                <input type="password" id="password" name="password" required
                    class="w-full border border-gray-300 px-4 py-2 rounded-md focus:ring-2 focus:ring-green-500" />
            </div>

            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required
                    class="w-full border border-gray-300 px-4 py-2 rounded-md focus:ring-2 focus:ring-green-500" />
            </div>

            <button type="submit"
                class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded-md transition">
                Reset Password
            </button>
        </form>
    </div>
</body>

</html>
