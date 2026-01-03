{{-- PROFIL PAGE --}}
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Noteledge - Catatan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @include('layouts.icon')
</head>
{{-- sesi include --}}
@include('layouts.navbarberanda')
@include('layouts.TombolTambah')
<br>

<div class="min-h-screen bg-[#F8FEFF] py-20 px-10 mt-10">
    <div class="max-w-6xl mx-auto flex flex-col md:flex-row items-start gap-10">

        <!-- FOTO PROFIL DAN NAMA -->
        <div class="flex flex-col items-center md:items-start space-y-4 w-full md:w-1/3">
            <img src="{{ asset('NL.png') }}" alt="Foto Profil"
                class="w-28 h-28 rounded-full border-4 border-[#4ED7F1] object-cover">
            <h2 class="text-2xl font-semibold text-gray-800">
                <h1>{{ $user->name }}</h1>
            </h2>
        </div>

        <!-- DAFTAR CATATAN / PDF -->
        <div class="flex-1 bg-white/80 backdrop-blur-sm border border-[#A8F1FF]/60 rounded-xl p-6 shadow-sm">
            <h3 class="text-lg font-semibold text-[#0088A9] mb-4">Catatan Saya</h3>

            <!-- Grid daftar PDF -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 ">
                @foreach ($catatans as $catatan)
                    <div class="bg-white border border-[#A8F1FF]/50 rounded-lg p-4 shadow hover:shadow-md transition flex flex-col justify-between h-full">
                        <p class="font-medium text-gray-700 mb-2">{{ Str::limit($catatan->judul,23) }}</p>
                        <div class="flex justify-between items-center">
                                <a href="{{ asset('storage/' . $catatan->lampiran) }}">
                                    Buka PDF
                                </a>
                                <a href="{{ asset('storage/' . $catatan->lampiran) }}" download
                                    class="text-sm text-gray-500 hover:text-[#4ED7F1] transition">
                                    Unduh
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Jika kosong -->
            @if (count($catatans) === 0)
                <p class="text-gray-500 text-sm italic">Belum ada catatan diunggah.</p>
            @endif
        </div>

    </div>
</div>
