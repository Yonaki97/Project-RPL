<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Catatan;
use App\Models\Kategori;

class CatatanController extends Controller
{
    public function create(Request $request)
    {
        $kategoris = Kategori::all();
        $SelectedKategori = $request->Kategori;
        return view('catatan.create', compact('kategoris','SelectedKategori'));
    }
    public function store(Request $request)
    {
        $request->validate([
        'judul'      => 'required|string|max:255',
        'id_kategori'=> 'required|exists:kategoris,id',
        'isi'        => 'nullable|string',
        'lampiran.*'   => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:10240'
        ]);

        $catatan = Catatan::create([
            'judul' => $request->judul,
            'id_kategori' => $request->id_kategori,
            'isi' => $request->isi,
            'id_user'   => auth()->id()
        ]);
                foreach ($request->file('lampiran') as $file){
            $path=$file->store('lampiran_catatan','public');

            $catatan->lampirans()->create([
                'file_path' => $path
            ]);
        }
        return redirect()->route('beranda')
    ->with('success', 'Catatan berhasil disimpan');
    }

    // menampilkan logic catatan 
    public function show(Catatan $catatan){

        // kalau misal pakai privasi, gunakan bawah ini(coming soon)
        // abort(403, 'Catatan ini bersifat pribadi');

        return view('catatan.previewcatatan', compact('catatan'));
    }
}