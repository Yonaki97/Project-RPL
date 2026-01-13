<nav class="fixed top-0 left-0 w-full z-50 bg-white/80 border-b border-[#A8F1FF]/50 backdrop-blur">
    <div class="max-w-7xl mx-auto flex items-center justify-between px-4 py-3 md:px-6">

        <!-- LEFT: Logo -->
        <a href="{{ route('beranda') }}" class="flex items-center gap-2">
        <img src="{{ asset('NL.png') }}" class="w-10 h-10 md:w-12 md:h-12" />
            <h1 class="hidden sm:block text-xl md:text-2xl font-bold text-[#4ED7F1]">
                Note<span class="text-[#FFCA28]">ledge</span>
            </h1>
        </a>

        <!--  Search (hidden di mobile) -->
        <div class="hidden md:block w-[40%]">
            <form method="GET" action="{{ route('beranda') }}">
            <input id="searchInput" type="text" placeholder="Cari catatan..." name="search" value="{{ request('search') }}"
                class="w-full border border-[#4ED7F1]/50 rounded-full px-5 py-2 text-sm
                focus:ring-2 focus:ring-[#4ED7F1] outline-none">
            </form>
        </div>

        <!--  Desktop -->
        <div class="hidden md:flex items-center gap-6">
            <!-- Tombol Bookmark - Link ke halaman bookmark -->
            <a href="{{ route('bookmark.page') }}" 
            class="flex items-center gap-2 px-4 py-2 rounded-lg transition-all duration-300 hover:bg-[#4ED7F1]/10 {{ Request::is('bookmark') ? 'bg-[#4ED7F1] text-white' : '' }}">
                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" 
                    style="fill: {{ Request::is('bookmark') ? '#FFFFFF' : '#6B7280' }}">
                    <path d="M17 3H7c-1.1 0-2 .9-2 2v16l7-3 7 3V5c0-1.1-.9-2-2-2z"/>
                </svg>
                <span class="font-medium {{ Request::is('bookmark') ? 'text-white' : 'text-gray-600' }}">Bookmark</span>
            </a>
            <span class="text-[#0088A9] font-semibold">
                Hello, {{ auth()->user()->name }}
            </span>
            <a href="{{ route('profil') }}"
               class="text-[#0088A9] font-semibold hover:text-[#4ED7F1]">
                Profil
            </a>
        </div>

        <!-- MOBILE MENU BUTTON -->
        <div class="md:hidden">
            <button onclick="document.getElementById('mobileMenu').classList.toggle('hidden')">
                ☰
            </button>
        </div>
    </div>

    <!-- MOBILE DROPDOWN -->
    <div id="mobileMenu" class="hidden md:hidden bg-white border-t px-4 py-3 space-y-3">
        <input type="text" placeholder="Cari catatan..."
            class="w-full border border-[#4ED7F1]/50 rounded-full px-4 py-2 text-sm">

        <a href="{{ route('profil') }}"
           class="block text-[#0088A9] font-semibold">
            Profil
        </a>
    </div>
</nav>