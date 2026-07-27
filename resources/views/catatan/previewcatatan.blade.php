<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preview Catatan</title>
    <link rel="stylesheet" href="{{ asset('css/preview.css') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    @include('layouts.icon')
</head>

<body>
    @include('layouts.navbarberanda')
    <br><br><br>
    <div class="container">
        <div class="preview-card">
            <!-- Header Card -->
            <div class="card-header">
                <h1>{{ $catatan->judul }}</h1>
                <span class="badge">
                    {{ $catatan->kategori->jurusan ?? '-' }}
                </span>
            </div>

            <!-- Body Card -->
            <div class="card-body">

                <!-- Meta Information -->
                <div class="meta-info">
                    <div class="meta-item">
                        <div class="info-label">Tanggal</div>
                        <div class="info-content">
                            {{ $catatan->created_at->translatedFormat('d F Y') }}
                        </div>
                    </div>

                    <div class="meta-item">
                        <div class="info-label">Penulis</div>
                        <div class="info-content">
                            {{ $catatan->user->name }}
                        </div>
                    </div>
                </div>
                <!-- Informasi Keamanan -->
                <div class="mt-5 rounded-lg border border-gray-200 bg-gray-50 p-4">

                    <h3 class="font-semibold text-gray-700 mb-3">
                        🔒 Keamanan Catatan
                    </h3>

                    @if ($valid == 1)
                        <div class="text-green-600 font-semibold">
                            ✅ Catatan Terverifikasi
                        </div>
                    @else
                        <div class="text-red-600 font-semibold">
                            ❌ Catatan Telah Dimodifikasi
                        </div>
                    @endif

                </div>
                <!-- Deskripsi Catatan -->
                <div class="info-section">
                    <div class="info-label">Deskripsi</div>
                    <div class="info-content">
                        {!! nl2br(e($catatan->isi)) !!}
                    </div>
                </div>
                <!-- Action Buttons -->
                <div class="flex flex-wrap gap-3 justify-start">
                    @if ($catatan->lampiran)
                        <a href="{{ asset('storage/' . $catatan->lampiran) }}"
                            class="bg-gradient-to-r from-[#4ED7F1] to-[#00B8D4] text-white px-6 py-2.5 rounded-lg font-semibold hover:shadow-lg transition-all hover:-translate-y-0.5"
                            download>
                            Download
                        </a>
                    @endif

                    {{-- Tombol Edit & Hapus (hanya untuk pemilik) --}}
                    @if (auth()->check() && auth()->id() == $catatan->id_user)
                        <a href="{{ route('catatan.edit', $catatan->id) }}"
                            class="bg-white border-2 border-[#4ED7F1] text-[#0088A9] px-6 py-2.5 rounded-lg font-semibold hover:bg-[#F0FCFF] hover:shadow-lg transition-all hover:-translate-y-0.5">
                            Edit
                        </a>

                        <form action="{{ route('catatan.destroy', $catatan->id) }}" method="POST" class="inline-block"
                            onsubmit="return confirm('Apakah kamu yakin ingin menghapus catatan ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="bg-red-600 text-white px-6 py-2.5 rounded-lg font-semibold hover:bg-red-700 hover:shadow-lg transition-all hover:-translate-y-0.5">
                                Hapus
                            </button>
                        </form>
                    @endif

                    <a href="{{ route('beranda') }}"
                        class="bg-gray-500 text-white px-6 py-2.5 rounded-lg font-semibold hover:bg-gray-600 transition-all hover:-translate-y-0.5">
                        Kembali
                    </a>
                </div>
                <!-- COMMENT SECTION -->
                <div class="mt-10 border-t pt-6">

                    <h3 class="text-lg font-semibold text-[#0088A9] mb-4">
                        💬 Komentar
                    </h3>

                    <!-- LIST KOMENTAR -->
                    <div class="space-y-4 mb-6">
                        @forelse ($catatan->comments as $comment)
                            <div class="bg-[#F8FEFF] border border-[#A8F1FF]/60 rounded-lg p-4">
                                <p class="text-sm font-semibold text-gray-700">
                                    {{ $comment->user->name }}
                                </p>
                                <p class="text-gray-600 text-sm mt-1">
                                    {{ $comment->isi }}
                                </p>
                                <p class="text-xs text-gray-400 mt-1">
                                    {{ $comment->created_at->diffForHumans() }}
                                </p>
                            </div>
                        @empty
                            <p class="text-sm text-gray-500">
                                Belum ada komentar.
                            </p>
                        @endforelse
                    </div>

                    <!-- FORM KOMENTAR -->
                    @auth
                        <form action="{{ route('komentar.store', $catatan->id) }}" method="POST"
                            class="bg-white border border-[#A8F1FF]/60 rounded-lg p-4">
                            @csrf

                            <textarea name="isi" rows="3" required placeholder="Tulis komentar..."
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg
                   focus:outline-none focus:ring-2 focus:ring-[#4ED7F1]
                   resize-none text-sm"></textarea>

                            <div class="flex justify-end mt-3">
                                <button type="submit"
                                    class="bg-[#4ED7F1] hover:bg-[#3ACEEA]
                       text-white text-sm font-semibold
                       px-5 py-2 rounded-full transition">
                                    Kirim
                                </button>
                            </div>
                        </form>
                    @else
                        <p class="text-sm text-gray-500">
                            Login untuk menulis komentar.
                        </p>
                    @endauth

                </div>

            </div>

</body>

</html>
