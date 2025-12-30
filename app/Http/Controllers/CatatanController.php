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
        'lampiran'   => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:10240'
        ]);

        $path=null;
        if($request->hasFile('lampiran')){
            $path=$request->file('lampiran')
                          ->store('lampiran_catatan', 'public');
        }
        Catatan::create([
            'judul' => $request->judul,
            'id_kategori' => $request->id_kategori,
            'isi' => $request->isi,
            'lampiran' => $path,
            'id_user'   => auth()->id()
        ]);
        return redirect()->route('beranda')
    ->with('success', 'Catatan berhasil disimpan');

    }
}
