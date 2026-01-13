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
    </div>
  </section>

  <!-- Why Section -->
<section class="py-24 px-6">
    <div class="text-center max-w-5xl mx-auto mb-16">
        <h2 class="text-4xl md:text-5xl font-extrabold mb-4">
            Kenapa mesti menggunakan NOTELEDGE?
        </h2>
        <p class="text-300 text-lg">
            Tempatnya ribuan catatan berkualitas!
        </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-12 max-w-6xl mx-auto">
        
        <!-- Item 1 -->
        <div class="text-center flex flex-col items-center">
            <img src="{{ asset('Book1.png') }}" class="w-28 h-28 mb-6" />
            <p class="text-300 leading-relaxed">
                NOTELEDGE menyediakan kumpulan catatan kuliah dari berbagai mahasiswa di seluruh Indonesia. Pengguna bisa menemukan perspektif berbeda, rangkuman yang ringkas, dan materi yang mungkin tidak dijelaskan dosen di kelas.
            </p>
        </div>

        <!-- Item 2 -->
        <div class="text-center flex flex-col items-center">
            <img src="{{ asset('Book2.png') }}" class="w-28 h-28 mb-6" />
            <p class="text-300 leading-relaxed">
                Setiap catatan yang diunggah sudah tersusun rapi dan mudah dibaca. Kamu bisa menghemat waktu belajar karena tidak perlu membuat ulang rangkuman, cukup gunakan catatan orang lain sebagai referensi tambahan.
            </p>
        </div>

        <!-- Item 3 -->
        <div class="text-center flex flex-col items-center">
            <img src="{{ asset('Book3.png') }}" class="w-28 h-28 mb-6" />
            <p class="text-300 leading-relaxed">
                NOTELEDGE bukan hanya tempat menyimpan catatan, tapi juga wadah untuk saling membantu. Dengan mengunggah catatanmu, kamu ikut mendukung mahasiswa lain yang butuh panduan dan referensi belajar.
            </p>
        </div>

    </div>
</section>


  <!-- Highlight Section -->
  <section class="bg-[#A8F1FF]/30 py-20 px-8 md:px-16 text-center">
    <h2 class="text-3xl font-bold text-gray-800 mb-4">
      Catat, Simpan, dan Ubah Ide Jadi Pengetahuan
    </h2>

    @auth
    <a href="{{route ('beranda') }}"> <button class="px-8 py-3 bg-[#FFCA28] 
    hover:bg-[#f] text-gray-800 font-semibold rounded-xl 
    shadow-md transition">
      Mulai Sekarang
        @endauth
      @guest
          <a href="{{ route('signup') }}">
        <button class="px-8 py-3 bg-[#FFCA28] hover:bg-[#f] text-gray-800 font-semibold rounded-xl shadow-md transition">
            Mulai Sekarang
        </button>
    </a>
      @endguest  
    </button>
  </a>
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