<main class="flex-1 space-y-6 mb-5">

    @forelse($catatans as $catatan)
        <div class="bg-white rounded-2xl border border-[#4ED7F1]/30 shadow-sm hover:shadow-md transition-all duration-300 p-6">
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

                    <div class="flex items-center gap-1 text-gray-500">

                        <button class="commentBtn hover:text-[#4ED7F1] transition">
                            <img src="{{ asset('comment.svg') }}" class="w-6 h-6">
                        </button>

                        <span class="text-sm select-none">
                            {{ $catatan->comments_count }}
                        </span>

                    </div>
                    <div class="flex items-center gap-1 text-gray-500">
                        {{-- <span class="text-sm">Comment</span> --}}
                        {{-- Like --}}
                        <div class="flex items-center gap-1 text-gray-500">
                            <button type="button"
                                    class="like-btn hover:text-red-500 transition" 
                                    data-catatan-id="{{ $catatan->id }}"
                                    data-liked="{{ $catatan->isLikedBy(auth()->id()) ? 'true' : 'false' }}">
                                
                                <svg class="likeIcon w-6 h-6 cursor-pointer transition" 
                                    xmlns="http://www.w3.org/2000/svg" 
                                    viewBox="0 0 24 24"
                                    style="fill: {{ $catatan->isLikedBy(auth()->id()) ? '#EF4444' : '#9CA3AF' }}">
                                    <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                                </svg>
                            </button>
                            
                            <span class="like-count text-sm select-none">
                                {{ $catatan->likes_count }}
                            </span>
                        </div>
                    </div>
                    {{-- Bookmark --}}
                        <div class="flex items-center gap-1 text-gray-500">
                            <button class="bookmark-btn hover:text-[#4ED7F1] transition" 
                                    data-catatan-id="{{ $catatan->id }}"
                                    data-bookmarked="{{ $catatan->isBookmarkedBy(auth()->id()) ? 'true' : 'false' }}">
                                <img src="{{ asset('bookmark.svg') }}" 
                                    class="bookmarkIcon w-6 h-6 cursor-pointer transition
                                            {{ $catatan->isBookmarkedBy(auth()->id()) ? 'fill-[#4ED7F1]' : '' }}" 
                                    alt="bookmark">
                            </button>
                            <span class="bookmark-count text-sm select-none">
                                {{ $catatan->bookmarks->count() }}
                            </span>
                        </div>
                </div>

                <div class="flex items-center gap-4">
                    @if ($catatan->lampiran)
                        <a href="{{ route('catatan.show', $catatan->id) }}"
                            class="bg-[#4ED7F1] hover:bg-[#3ACEEA]
                      text-white font-semibold px-5 py-2
                      rounded-full transition">
                            Lihat Catatan
                        </a>
                    @endif
                </div>

            </div>
        </div>
    @empty
        <p class="text-gray-500">Belum ada catatan.</p>
    @endforelse
    <div class="mt-6">
    {{ $catatans->links() }}
</div>

    {{-- Khusus Javascript, handle tombol feature --}}

    <script src="{{ asset('js/Bookmark.js') }}"></script>
    <script src="{{ asset('js/Like.js') }}"></script>
</main>
