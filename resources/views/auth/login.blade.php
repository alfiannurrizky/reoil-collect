<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('Template/assets/static/images/logo/logo-reoil-2.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #7e5bef, #5925cc);
            min-height: 100vh;
        }
    </style>
</head>

<body class="flex items-center justify-center min-h-screen px-4">

    <div class="max-w-md w-full bg-white bg-opacity-20 backdrop-blur-md rounded-3xl shadow-lg p-10 text-gray-100">

        <div class="mb-8 text-center">
            <h1 class="text-4xl font-extrabold mb-2 tracking-tight">Welcome Back</h1>
            <p class="text-purple-200">Silakan login untuk melanjutkan</p>
        </div>

        <form method="POST" action="{{ route('login') }}" class="space-y-6">
            @csrf

            <div>
                <label for="email" class="block mb-2 font-semibold">Email</label>
                <input id="email" name="email" type="email" value="{{ old('email') }}"
                    placeholder="you@example.com" required autofocus
                    class="w-full px-4 py-3 rounded-xl bg-white bg-opacity-30 placeholder-purple-300 text-purple-900 font-medium focus:outline-none focus:ring-2 focus:ring-purple-500 @error('email') border-2 border-red-500 @enderror" />
                @error('email')
                    <p class="mt-1 text-red-400 text-sm font-semibold">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password" class="block mb-2 font-semibold">Password</label>
                <input id="password" name="password" type="password" placeholder="••••••••" required
                    class="w-full px-4 py-3 rounded-xl bg-white bg-opacity-30 placeholder-purple-300 text-purple-900 font-medium focus:outline-none focus:ring-2 focus:ring-purple-500 @error('password') border-2 border-red-500 @enderror" />
                @error('password')
                    <p class="mt-1 text-red-400 text-sm font-semibold">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit"
                class="w-full bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-700 hover:to-indigo-700 text-white font-bold py-3 rounded-xl shadow-lg transition duration-300">
                Login
            </button>
        </form>

    </div>

</body>

</html>
