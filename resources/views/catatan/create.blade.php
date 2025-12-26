<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Noteledge</title>
    @include('layouts.icon')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tom-select/dist/css/tom-select.css" />
    <script src="https://cdn.jsdelivr.net/npm/tom-select/dist/js/tom-select.complete.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/tomselect.css') }}">

    <style>
        body {
            background: linear-gradient(to bottom right, #A8F1FF, #ffffff);
        }
    </style>
    <div class="min-h-screen flex items-center justify-center bg-[#F9FCFD] px-4">
        <form action="{{ route('catatan.store') }}" method="POST" enctype="multipart/form-data"
            class="w-full max-w-lg bg-white rounded-2xl shadow-lg p-8">
            @csrf
            <!-- Judul -->
            <div class="mb-5">
                <label class="block text-sm font-medium text-gray-600 mb-2">
                    Judul
                </label>
                <input type="text" name="judul" placeholder="Masukkan judul catatan" required
                    class="w-full px-4 py-3 rounded-lg border border-gray-300
                          focus:outline-none focus:ring-2 focus:ring-[#4ED7F1]
                          focus:border-transparent">
            </div>
            <!-- Kategori -->
            <div class="mb-5">
                <label class="block text-sm font-medium text-gray-600 mb-2">
                    Kategori
                </label>

                <select id="kategori" name="kategori_id" required>
                    <option value="">Pilih Kategori</option>
                    <option value="1">Ilmu Komputer</option>
                    <option value="2">Hukum</option>
                    <option value="3">Ekonomi</option>
                    <option value="4">Matematika</option>
                    <option value="5">Kedokteran</option>
                    <option value="6">Psikologi</option>
                    <option value="7">Teknik Elektro</option>
                    <option value="8">Teknik Mesin</option>
                    <option value="9">DKV</option>
                    <option value="10">Sastra Jepang</option>
                    <option value="11">Sastra Inggris</option>
                </select>
            </div>

            <!-- Isi -->
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-600 mb-2">
                    Deskripsi1289381230891038912
                </label>
                <textarea name="isi" rows="5" placeholder="Tulis isi catatan di sini..."
                    class="w-full px-4 py-3 rounded-lg border border-gray-300
                             focus:outline-none focus:ring-2 focus:ring-[#4ED7F1]
                             focus:border-transparent resize-none"></textarea>
            </div>

            {{-- Upload Catatan --}}
            <div class="mb-5">
    <label class="block text-sm font-medium text-gray-600 mb-2">
        Lampiran (opsional)
    </label>

    <input type="file"
           name="lampiran"
           class="w-full px-4 py-2 border border-gray-300 rounded-lg
                  focus:outline-none focus:ring-2 focus:ring-[#4ED7F1]">
</div>

            <!-- Tombol -->
            <button type="submit"
                class="w-full bg-[#4ED7F1] hover:bg-[#3BC3DD]
                       text-white font-semibold py-3 rounded-lg
                       transition duration-300 shadow-md">
                Upload Catatan
            </button>

        </form>
    </div>
    <script>
        const kategori = new TomSelect("#kategori", {
            placeholder: "Pilih atau cari kategori",
            allowEmptyOption: true,
            hidePlaceholder: true,
            create: false,

            onItemAdd() {

                this.control_input.disabled = true;
            },

            onFocus() {
                if (this.items.length) {

                    this.control_input.disabled = false;
                    this.clear(true);
                }
            }
        });
    </script>
