<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Catatan</title>
    <link rel="stylesheet" href="{{ asset('css/preview.css') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    @include('layouts.icon')
</head>

<body>
    @include('layouts.navbarberanda')
    <br><br><br>
    
    <div class="container max-w-4xl mx-auto px-4">
        <div class="bg-white rounded-lg shadow-lg p-8">
            <h1 class="text-3xl font-bold text-[#0088A9] mb-6">Edit Catatan</h1>

            <form action="{{ route('catatan.update', $catatan->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Judul -->
                <div class="mb-6">
                    <label for="judul" class="block text-gray-700 font-semibold mb-2">Judul</label>
                    <input type="text" 
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#4ED7F1] @error('judul') border-red-500 @enderror" 
                           id="judul" 
                           name="judul" 
                           value="{{ old('judul', $catatan->judul) }}" 
                           required>
                    @error('judul')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Kategori -->
                <div class="mb-6">
                    <label for="id_kategori" class="block text-gray-700 font-semibold mb-2">Kategori</label>
                    <select class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#4ED7F1] @error('id_kategori') border-red-500 @enderror" 
                            id="id_kategori" 
                            name="id_kategori" 
                            required>
                        <option value="">Pilih Kategori</option>
                        @foreach($kategoris as $kategori)
                            <option value="{{ $kategori->id }}" 
                                {{ old('id_kategori', $catatan->id_kategori) == $kategori->id ? 'selected' : '' }}>
                                {{ $kategori->jurusan }}
                            </option>
                        @endforeach
                    </select>
                    @error('id_kategori')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Isi Catatan -->
                <div class="mb-6">
                    <label for="isi" class="block text-gray-700 font-semibold mb-2">Deskripsi</label>
                    <textarea class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#4ED7F1] resize-none @error('isi') border-red-500 @enderror" 
                              id="isi" 
                              name="isi" 
                              rows="8">{{ old('isi', $catatan->isi) }}</textarea>
                    @error('isi')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- File Lampiran -->
                <div class="mb-6">
                    <label for="lampiran" class="block text-gray-700 font-semibold mb-2">File Lampiran (Opsional)</label>
                    
                    @if($catatan->lampiran)
                        <div class="mb-3 p-3 bg-blue-50 border border-blue-200 rounded-lg">
                            <p class="text-sm text-gray-600">File saat ini:</p>
                            <a href="{{ asset('storage/' . $catatan->lampiran) }}" 
                               target="_blank"
                               class="text-[#0088A9] hover:underline font-semibold">
                                Lihat File
                            </a>
                        </div>
                    @endif
                    
                    <input type="file" 
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#4ED7F1] @error('lampiran') border-red-500 @enderror" 
                           id="lampiran" 
                           name="lampiran" 
                           accept=".pdf,.jpg,.jpeg,.png">
                    <p class="text-sm text-gray-500 mt-2">Biarkan kosong jika tidak ingin mengubah file. Format: PDF, JPG, JPEG, PNG (Max: 10MB)</p>
                    @error('lampiran')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Tombol Aksi -->
                <div class="flex gap-3">
                    <button type="submit" 
                            class="bg-gradient-to-r from-[#4ED7F1] to-[#00B8D4] text-white px-8 py-3 rounded-lg font-semibold hover:shadow-lg transition-all hover:-translate-y-0.5">
                        Update Catatan
                    </button>
                    <a href="{{ route('beranda') }}" 
                       class="bg-gray-500 text-white px-8 py-3 rounded-lg font-semibold hover:bg-gray-600 transition-all hover:-translate-y-0.5">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>

</body>

</html>