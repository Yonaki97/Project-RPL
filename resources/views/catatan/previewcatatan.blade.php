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

                <!-- Deskripsi Catatan -->
                <div class="info-section">
                    <div class="info-label">Deskripsi Catatan</div>
                    <div class="info-content">
                        {!! nl2br(e($catatan->isi)) !!}
                    </div>
                </div>
                <!-- Action Buttons -->
                <div class="action-buttons">
                    @if ($catatan->lampiran)
                        <a href="{{ asset('storage/' . $catatan->lampiran) }}" class="btn btn-primary" download>
                            Download
                        </a>
                    @endif

                    <a href="{{ route('beranda') }}" class="btn btn-secondary">
                        Kembali
                    </a>
                </div>
                <!-- COMMENT SECTION -->
<div class="mt-10 border-t pt-6">

    <h3 class="text-lg font-semibold text-[#0088A9] mb-4">
        💬 Komentar
    </h3>

    <!-- LIST KOMENTAR (DUMMY) -->
    <div class="space-y-4 mb-6">

        <div class="bg-[#F8FEFF] border border-[#A8F1FF]/60 rounded-lg p-4">
            <p class="text-sm font-semibold text-gray-700">hujanrintik</p>
            <p class="text-gray-600 text-sm mt-1">
                Ini catatannya rapi banget 👍
            </p>
        </div>

        <div class="bg-[#F8FEFF] border border-[#A8F1FF]/60 rounded-lg p-4">
            <p class="text-sm font-semibold text-gray-700">user123</p>
            <p class="text-gray-600 text-sm mt-1">
                Ngebantu banget buat belajar 🙏
            </p>
        </div>

    </div>

    <!-- FORM KOMENTAR (UI ONLY) -->
    <div class="bg-white border border-[#A8F1FF]/60 rounded-lg p-4">
        <textarea
            rows="3"
            placeholder="Tulis komentar..."
            class="w-full px-4 py-2 border border-gray-300 rounded-lg
                   focus:outline-none focus:ring-2 focus:ring-[#4ED7F1]
                   resize-none text-sm"></textarea>

        <div class="flex justify-end mt-3">
            <button
                type="button"
                class="bg-[#4ED7F1] hover:bg-[#3ACEEA]
                       text-white text-sm font-semibold
                       px-5 py-2 rounded-full transition">
                Kirim
            </button>
        </div>
    </div>

</div>

            </div>
        </div>
    </div>

</body>

</html>
