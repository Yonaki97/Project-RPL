<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Noteledge - Catatan</title>
  <script src="https://cdn.tailwindcss.com"></script>
  @include('layouts.icon')
</head>

<body class="bg-[#F9FCFD] text-gray-800">

  @include('layouts.navbarberanda')
  {{-- Manggil Konten Kategori --}}
  @include('layouts.sidebarmapel')
  {{-- Manggil Main Card --}}
  @include('layouts.card')

  <!-- 🌙 JS Navbar shrink -->
  <script>
    const navbar = document.getElementById("navbar");
    window.addEventListener("scroll", () => {
      if (window.scrollY > 20) {
        navbar.classList.remove("bg-white/80");
        navbar.classList.add("bg-white", "shadow-md");
      } else {
        navbar.classList.add("bg-white/80");
        navbar.classList.remove("bg-white", "shadow-md");
      }
    });
  </script>

</body>
</html>
