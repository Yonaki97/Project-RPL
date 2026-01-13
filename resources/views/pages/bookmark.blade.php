<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Bookmark - Noteledge</title>
    
    {{-- Tailwind CSS atau CSS Anda --}}
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
    

    {{-- Navbar --}}
    @include('layouts.navbarberanda')

    <div class="max-w-7xl mx-auto px-6 py-8">
        
        {{-- Header --}}
        <div class="mb-8 fade-in">
            <p class="text-gray-600">Catatan yang kamu simpan</p>
        </div>

        {{-- Content --}}
        <div class="flex gap-6">
            

            {{-- Main Content - Card Catatan --}}
            <main class="flex-1 space-y-6">
                
                @forelse($catatans as $catatan)
                    <div class="bg-white rounded-2xl border border-[#4ED7F1]/30 shadow-sm hover:shadow-md transition-all duration-300 p-6 fade-in"
                         data-catatan-card="{{ $catatan->id }}"
                         data-is-bookmarked="true">

                        <div class="flex items-center gap-3 mb-3">
                            <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png"
                                class="w-10 h-10 rounded-full border border-[#4ED7F1]/40">
                            <div>
                                <h3 class="font-semibold">
                                    {{ $catatan->user->name }}
                                </h3>
                                <p class="text-sm text-gray-500">
                                    {{ $catatan->created_at->diffForHumans() }}
                                    • {{ $catatan->kategori->jurusan }}
                                </p>
                            </div>
                        </div>

                        <h2 class="text-lg font-bold text-[#0088A9] mb-2">
                            {{ $catatan->judul }}
                        </h2>

                        <p class="text-gray-600 mb-4 leading-relaxed">
                            {{ Str::limit($catatan->isi, 120) }}
                        </p>

                        <div class="flex justify-between items-center mt-4">

                            <div class="flex items-center gap-6 text-gray-500">

                                {{-- Comment --}}
                                <div class="flex items-center gap-1 text-gray-500">
                                    <button class="commentBtn hover:text-[#4ED7F1] transition">
                                        <img src="{{ asset('img/comment.svg') }}" class="w-6 h-6">
                                    </button>
                                    <span class="text-sm select-none">
                                        {{ $catatan->comments_count }}
                                    </span>
                                </div>

                                {{-- Like --}}
                                <div class="flex items-center gap-1 text-gray-500">
                                    <button class="likeBtn">
                                        <img src="{{ asset('img/heart.svg') }}" class="heartIcon w-6 h-6 cursor-pointer transition" alt="like">
                                    </button>
                                    <span class="text-sm select-none">
                                        {{ $catatan->likes_count }}
                                    </span>
                                </div>

                                {{-- Bookmark --}}
                                <div class="flex items-center gap-1 text-gray-500">
                                    <button type="button"
                                            class="bookmark-btn hover:text-[#4ED7F1] transition" 
                                            data-catatan-id="{{ $catatan->id }}"
                                            data-bookmarked="true">
                                        
                                        <svg class="bookmarkIcon w-6 h-6 cursor-pointer transition" 
                                             xmlns="http://www.w3.org/2000/svg" 
                                             viewBox="0 0 24 24"
                                             style="fill: #4ED7F1">
                                            <path d="M17 3H7c-1.1 0-2 .9-2 2v16l7-3 7 3V5c0-1.1-.9-2-2-2z"/>
                                        </svg>
                                    </button>
                                    
                                    <span class="bookmark-count text-sm select-none">
                                        {{ $catatan->bookmarks->count() }}
                                    </span>
                                </div>

                            </div>

                            {{-- Button Lihat Catatan --}}
                            <div class="flex items-center gap-4">
                                @if ($catatan->lampiran)
                                    <a href="{{ route('catatan.show', $catatan->id) }}"
                                        class="bg-[#4ED7F1] hover:bg-[#3ACEEA] text-white font-semibold px-5 py-2 rounded-full transition">
                                        Lihat Catatan
                                    </a>
                                @endif
                            </div>

                        </div>
                    </div>
                @empty
                    {{-- Pesan Kosong --}}
                    <div class="bg-white rounded-2xl border border-[#4ED7F1]/30 shadow-sm p-12 text-center fade-in">
                        <svg class="w-20 h-20 mx-auto mb-4 opacity-40" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" style="fill: #9CA3AF;">
                            <path d="M17 3H7c-1.1 0-2 .9-2 2v16l7-3 7 3V5c0-1.1-.9-2-2-2z"/>
                        </svg>
                        <h3 class="text-2xl font-semibold text-gray-700 mb-2">Belum Ada Catatan yang Di-bookmark</h3>
                        <p class="text-gray-500 mb-6">Klik ikon bookmark pada catatan untuk menyimpannya</p>
                        <a href="{{ route('beranda') }}" 
                           class="inline-block bg-[#4ED7F1] hover:bg-[#3ACEEA] text-white font-semibold px-6 py-3 rounded-full transition">
                            Kembali ke Beranda
                        </a>
                    </div>
                @endforelse

            </main>

        </div>
    </div>

    {{-- JavaScript --}}
    <script src="{{ asset('js/Bookmark.js') }}"></script>
    <script src="{{ asset('js/Like.js') }}"></script>
    
    {{-- Script khusus untuk halaman bookmark: auto-hide card saat unbookmark --}}
    <script>
        // Override behavior bookmark.js untuk halaman bookmark
        document.addEventListener('DOMContentLoaded', function() {
            // Detect ketika berhasil unbookmark
            const observer = new MutationObserver(function(mutations) {
                mutations.forEach(function(mutation) {
                    if (mutation.type === 'attributes' && mutation.attributeName === 'data-bookmarked') {
                        const card = mutation.target.closest('[data-catatan-card]');
                        if (card && mutation.target.dataset.bookmarked === 'false') {
                            // Hide card dengan animasi
                            card.style.opacity = '0';
                            card.style.transform = 'translateY(-20px)';
                            setTimeout(() => {
                                card.remove();
                                
                                // Cek apakah masih ada card
                                const remainingCards = document.querySelectorAll('[data-catatan-card]');
                                if (remainingCards.length === 0) {
                                    location.reload(); // Reload untuk tampilkan pesan kosong
                                }
                            }, 300);
                        }
                    }
                });
            });
            
            document.querySelectorAll('.bookmark-btn').forEach(btn => {
                observer.observe(btn, { attributes: true });
            });
        });
    </script>
</body>
</html>