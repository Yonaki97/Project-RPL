 <!--  KONTEN -->
 <div class="max-w-7xl mx-auto mt-28 flex gap-8 px-6">

     <!--  Sidebar -->
     <aside
         class="sticky top-28
         w-1/4
         bg-white rounded-2xl
         border border-[#4ED7F1]/30
         p-5
         shadow-sm
         hover:shadow-md
         transition-all
         duration-300
         h-fit">
         
        <a href ="{{route ('beranda')}}"class="block text-lg font-semibold text-[#0088A9] mb-2">Kategori</a>
         <ul class="space-y-3 text-gray-700">
            @foreach($kategoris as $kategori)
            <li>
                <a href="{{ route('beranda', ['kategori'=> $kategori->id]) }}"
                    class="hover:text-[#4ED7F1] transisition">
                    {{ $kategori->jurusan }}
                </a>
            </li>
            @endforeach
         </ul>
     </aside>