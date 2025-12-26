<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up - Noteledge</title>
  <script src="https://cdn.tailwindcss.com"></script>
  @include('layouts.icon')
</head>
<body class="min-h-screen flex items-center justify-center">

  <div class="bg-white/80 backdrop-blur-md border border-[#4ED7F1]/80 rounded-2xl shadow-xl p-8 w-[380px] ">
    <h2 class="text-2xl font-bold text-center text-gray-700 mb-6">Create Account</h2>
@if ($errors->any())
  <div class="mb-4 p-3 rounded-lg bg-red-100 text-red-700 text-sm">
    <ul class="list-disc list-inside">
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif

@if (session('success'))
  <div class="mb-4 p-3 rounded-lg bg-green-100 text-green-700 text-sm">
    {{ session('success') }}
  </div>
@endif
    <form action="/signup" method="POST" class="space-y-4">
      @csrf
      <div>
        <label class="block text-gray-600 text-sm mb-1 font-medium">Full Name</label>
        <input type="text" name="name" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#4ED7F1] outline-none" required>
      </div>

      <div>
        <label class="block text-gray-600 text-sm mb-1 font-medium">Email</label>
        <input type="email" name="email" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#4ED7F1] outline-none" required>
      </div>

      <div>
        <label class="block text-gray-600 text-sm mb-1 font-medium">Password</label>
        <input type="password" name="password" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#4ED7F1] outline-none" required>
      </div>
<div class="flex space-x-4 mt-4">
  <button type="submit"
    class="w-1/2 bg-[#4ED7F1] hover:bg-[#6FE6FC] text-white font-semibold py-2 rounded-lg transition duration-300">
    Sign up
  </button>

<a href="{{ route('google.login') }}" 
  class="w-1/2 flex items-center justify-center bg-white border border-gray-300 hover:bg-gray-100 text-gray-700 font-semibold py-2 rounded-lg transition duration-300 shadow-sm">
  <img src="{{ asset('googleco.ico') }}" alt="Google Logo" class="w-5 h-5 mr-2">
  <span>Google</span>
</a>
  </div>

</body>
</html>
