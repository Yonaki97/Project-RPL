<main class="flex-1 space-y-6 mb-5">

    @forelse($catatans as $catatan)
        <div
            class="bg-white rounded-2xl border border-[#4ED7F1]/30 shadow-sm hover:shadow-md transition-all duration-300 p-6">

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
                    <button class="flex items-center gap-1 hover:text-[#4ED7F1] transition">
                        <img src="{{ asset('img/comment.svg') }}" class="w-6 h-6 transition hover:opacity-50 "
                            alt="Comment">

                        {{-- <span class="text-sm">Comment</span> --}}
                        <button class="likeBtn">
                            <img src="{{ asset('img/heart.svg') }}" class="heartIcon w-6 h-6 cursor-pointer transititon"
                                alt="like">
                        </button>

                        {{-- Bookmark --}}
                        <button class="flex items-center gap-1 hover:text-yellow-500 transition">
                            <img src="{{ asset('bookmark.png') }}" class="w-5 h-5" alt="bookmark">

                            {{-- <span class="text-sm">Save</span> --}}
                        </button>

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
    <script>
        document.querySelectorAll('.likeBtn').forEach(btn => {
            btn.addEventListener('click', () => {
                const heart = btn.querySelector('.heartIcon');
                if (heart.dataset.liked === "true") {
                    // unlike
                    heart.src = "{{ asset('img/heart.svg') }}";
                    heart.dataset.liked = "false";
                } else {
                    heart.src = "{{ asset('img/heart-fill.svg') }}";
                    heart.dataset.liked = "true"
                }
            });
        });
    </script>
</main>
