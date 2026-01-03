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

                    @if ($catatan->lampirans->count())
                        @foreach ($catatan->lampirans as $lampiran)
                            <a href="{{ asset('storage/' . $lampiran->file_path) }}" class="btn btn-primary" download>
                                Download
                            </a>
                        @endforeach
                    @endif
                    <a href="{{ route('beranda') }}" class="btn btn-secondary">
                        Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
