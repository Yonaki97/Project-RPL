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
    
    <form action="/signin" method="POST" class="space-y-5">
      <div>
        <label for="email" class="block text-gray-700 font-medium mb-1">Email</label>
        <input type="email" id="email" name="email" required
          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#4ED7F1] focus:outline-none">
      </div>

      <div>
        <label for="password" class="block text-gray-700 font-medium mb-1">Password</label>
        <input type="password" id="password" name="password" required
          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#4ED7F1] focus:outline-none">
      </div>

      <button type="submit"
        class="w-full bg-[#4ED7F1] hover:bg-[#6FE6FC] text-white font-semibold py-2 rounded-lg transition duration-300">
        Sign In
      </button>

      <p class="text-center text-sm text-gray-600">
        Don't have an account?
        <a href="/signup" class="text-[#4ED7F1] font-medium hover:underline">Sign Up</a>
      </p>
    </form>
  </div>

</body>
</html>
