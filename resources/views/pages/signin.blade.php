<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In - Noteledge</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @include('layouts.icon')
</head>

<body class="min-h-screen flex items-center justify-center">

    <div class="w-full max-w-md bg-white/80 backdrop-blur-md rounded-2xl shadow-lg p-8 border border-[#4ED7F1]/80">
        <h2 class="text-3xl font-bold text-center text-[#0088A9] mb-6 text-gray-700">Login Account</h2>
            @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-4">
            {{ session('success') }}
            </div>
            @endif
        <form action="/signin" method="POST" class="space-y-4">
            @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-4">
                {{ session('error') }}
            </div>
            @endif
            @csrf
            @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-4">
                {{ $errors->first() }}
            </div>
            @endif
            <form action="/signin" method="POST" class="space-y-5">
                @csrf
                <div>
                    <label for="name" class="block text-gray-700 font-medium mb-1">Email / Name</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#4ED7F1] focus:outline-none">
                </div>

                <div>
                    <label for="password" class="block text-gray-700 font-medium mb-1">Password</label>
                    <input type="password" id="password" name="password" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#4ED7F1] focus:outline-none">
                </div>
                <div class="flex space-x-4 mt-4">
                    <button type="submit"
                        class="w-1/2 bg-[#4ED7F1] hover:bg-[#6FE6FC] text-white font-semibold py-2 rounded-lg transition duration-300">
                        Sign In
                    </button>

                    <a href="{{ route('google.login') }}"
                        class="w-1/2 flex items-center justify-center bg-white border border-gray-300 hover:bg-gray-100 text-gray-700 font-semibold py-2 rounded-lg transition duration-300 shadow-sm">
                        <img src="{{ asset('googleco.ico') }}" alt="Google Logo" class="w-5 h-5 mr-2">
                        <span>Google</span>
                    </a>

                </div>

                <p class="text-center text-sm text-gray-600">
                    Don't have an account?
                    <a href="/signup" class="text-[#4ED7F1] font-medium hover:underline">Sign Up</a>
                </p>
            </form>
    </div>
</body>
</html>
