<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Noteledge</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    body {
      background: linear-gradient(to bottom right, #A8F1FF, #ffffff);
    }
  </style>
  @include('layouts.icon')

</head>
<body class="font-sans text-gray-800">

<nav class="fixed top-0 left-0 w-full z-50 bg-white/70 backdrop-blur-md border-b border-[#A8F1FF]/50 transition-all duration-300">

  <div class="max-w-7xl mx-auto flex justify-between items-center py-4 px-6 transition-all duration-300">
    
    <!-- Logo + Nama -->
    <div class="flex items-center gap-x-3">
      <img src="{{ asset('NL.png') }}" alt="Logo" class="w-10 h-10 transform scale-[2.5] origin-center" />
      <h1 class="text-2xl font-bold text-[#4ED7F1] mt-3 mb-2 pl-1">Note<span class="text-[#FFCA28]">ledge</span></h1>
    </div>

    <!-- Menu -->
    <div class="space-x-6 font-semibold">
      <a href="signin" class="hover:text-[#6FE6FC] transition">MASUK</a>
      <a href="signup" class="hover:text-[#6FE6FC] transition">DAFTAR</a>
    </div>
  </div>
</nav>


  <!-- Hero Section -->
  <section class="flex flex-col justify-center min-h-screen px-8 md:px-16 pt-32">
    <div class="max-w-3xl">
      <h1 class="text-5xl md:text-6xl font-extrabold leading-tight mb-6 text-gray-900">
        DARI CATATAN JADI <br />
        <span class="bg-gradient-to-r from-[#4ED7F1] to-[#6FE6FC] bg-clip-text text-transparent">PENGETAHUAN</span>
      </h1>
      <p class="text-gray-600 mb-8 text-lg font-medium">
        Dengan Noteledge, kamu bisa mengorganisir ide, catatan, dan inspirasi secara efisien dan menyenangkan.
      </p>

      <!-- Search Bar -->
      <div class="relative w-full md:w-3/4">
        <input
          type="text"
          placeholder="Cari catatan..."
          class="w-full p-4 pr-12 rounded-2xl border border-[#A8F1FF] bg-white shadow-sm focus:ring-4 focus:ring-[#6FE6FC]/50 focus:border-[#6FE6FC] outline-none transition"
        />
        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
          viewBox="0 0 24 24" stroke-width="1.5" stroke="#6FE6FC"
          class="absolute right-4 top-1/2 transform -translate-y-1/2 w-6 h-6">
          <path stroke-linecap="round" stroke-linejoin="round"
            d="M21 21l-4.35-4.35M10 18a8 8 0 1 1 0-16 8 8 0 0 1 0 16z" />
        </svg>
      </div>
    </div>
  </section>

  <!-- Highlight Section -->
  <section class="bg-[#A8F1FF]/30 py-20 px-8 md:px-16 text-center">
    <h2 class="text-3xl font-bold text-gray-800 mb-4">
      Catat, Simpan, dan Ubah Ide Jadi Pengetahuan
    </h2>
    <a href="beranda"> <button class="px-8 py-3 bg-[#FFCA28] 
    hover:bg-[#f] text-gray-800 font-semibold rounded-xl 
    shadow-md transition">
      Mulai Sekarang
    </button></a>
  </section>

  <!-- Footer -->
  <footer class="bg-white border-t border-[#A8F1FF]/50 py-6 text-center text-gray-500">
    © 2025 Noteledge — Semua Hak Dilindungi.
  </footer>
<script>
  window.addEventListener("scroll", function () {
    const navbar = document.querySelector("nav");

    if (window.scrollY > 10) {
      // reminder
      // jika user scroll kebawah lebih dari 10px
      navbar.classList.add("py-0");
      navbar.classList.remove("py-10");
    } else {
      // jika user balik scroll ke atas
      navbar.classList.add("py-10");
      navbar.classList.remove("py-0");
    }
  });
</script>

</body>
</html>