<!-- 🌐 NAVBAR -->
  <nav id="navbar" class="fixed top-0 left-0 w-full z-50 bg-white/80 border-b border-[#A8F1FF]/50 backdrop-blur-sm transition-all duration-300">
    <div class="max-w-7xl mx-auto flex justify-between items-center py-5 px-6 transition-all duration-300">

      <!-- 🔹 Logo + Nama -->
      <div class="flex items-center gap-x-3 select-none">
        <img src="{{ asset('NL.png') }}" alt="Logo" class="w-10 h-10 transform scale-[2] origin-center" />
        <h1 class="text-2xl font-bold text-[#4ED7F1]">
          Note<span class="text-[#FFCA28]">ledge</span>
        </h1>
      </div>

      <!-- 🔍 Search -->
      <div class="relative w-[40%]">
        <input 
          type="text" 
          placeholder="Cari catatan..." 
          class="w-full border border-[#4ED7F1]/50 rounded-full px-5 py-2 pl-10 text-sm focus:ring-2 focus:ring-[#4ED7F1] focus:border-[#4ED7F1] outline-none shadow-sm">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 1116.65 16.65z" />
        </svg>
      </div>

      <!-- 👤 Profil -->
      <a href="profil" class="text-[#0088A9] font-semibold hover:text-[#4ED7F1] transition">Profil</a>
    </div>
  </nav>