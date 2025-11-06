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

    <form action="/signup" method="POST" class="space-y-4">
      <div>
        <label class="block text-gray-600 text-sm mb-1">Full Name</label>
        <input type="text" name="name" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#4ED7F1] outline-none" required>
      </div>

      <div>
        <label class="block text-gray-600 text-sm mb-1">Email</label>
        <input type="email" name="email" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#4ED7F1] outline-none" required>
      </div>

      <div>
        <label class="block text-gray-600 text-sm mb-1">Password</label>
        <input type="password" name="password" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#4ED7F1] outline-none" required>
      </div>

      <button type="submit" class="w-full py-2 rounded-lg bg-[#4ED7F1] hover:bg-[#6FE6FC] transition text-white font-semibold shadow">
        Sign Up
      </button>
    </form>

    <p class="text-center text-sm text-gray-600 mt-4">
      Already have an account? 
      <a href="/signin" class="text-[#4ED7F1] hover:underline font-medium">Sign In</a>
    </p>
  </div>

</body>
</html>
