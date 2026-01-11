<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Catatan;
use App\Models\Kategori;
use Illuminate\Support\Facades\Storage;

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
        ],[
            'lampiran.mimes' => 'Hanya boleh upload file PDF, JPG, JPEG atau PNG',
            'lampiran.max'  => 'Ukuran file maksimal 10MB'
        ]);

        $path=null;
        if($request->hasFile('lampiran')){
            $path=$request->file('lampiran')
                          ->store('lampiran_catatan', 'public');
        }
        if(
        Catatan::create([
            'judul' => $request->judul,
            'id_kategori' => $request->id_kategori,
            'isi' => $request->isi,
            'lampiran' => $path,
            'id_user'   => auth()->id()
        ]));
        return redirect()->route('beranda')
    ->with('success', 'Catatan berhasil disimpan');
    }

    // menampilkan logic catatan 
    public function show(Catatan $catatan){
        // kalau misal pakai privasi, gunakan bawah ini(coming soon)
        // abort(403, 'Catatan ini bersifat pribadi');

        return view('catatan.previewcatatan', compact('catatan'));
    }

    // Method untuk menampilkan form edit
    public function edit($id)
    {
        $catatan = Catatan::findOrFail($id);
        $kategoris = Kategori::all();
        return view('catatan.edit', compact('catatan', 'kategoris'));
    }

    // Method untuk update catatan
    public function update(Request $request, $id)
{
    $catatan = Catatan::findOrFail($id);
    
    $request->validate([
        'judul' => 'required|string|max:255',
        'id_kategori' => 'required', // Hapus exists check
        'isi' => 'nullable|string',
        'lampiran' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:10240',
    ], [
        'lampiran.mimes' => 'Hanya boleh upload file PDF, JPG, JPEG atau PNG',
        'lampiran.max' => 'Ukuran file maksimal 10MB'
    ]);
    
    $catatan->judul = $request->judul;
    $catatan->id_kategori = $request->id_kategori;
    $catatan->isi = $request->isi;
    
    if($request->hasFile('lampiran')){
        if($catatan->lampiran && Storage::disk('public')->exists($catatan->lampiran)){
            Storage::disk('public')->delete($catatan->lampiran);
        }
        
        $path = $request->file('lampiran')->store('lampiran_catatan', 'public');
        $catatan->lampiran = $path;
    }
    
    $catatan->save();
    
    return redirect()->route('beranda')->with('success', 'Catatan berhasil diupdate');
}

    // Method untuk hapus catatan
    public function destroy($id)
    {
        $catatan = Catatan::findOrFail($id);
        
        // Hapus file lampiran jika ada
        if($catatan->lampiran && \Storage::disk('public')->exists($catatan->lampiran)){
            \Storage::disk('public')->delete($catatan->lampiran);
        }
        
        // Hapus data dari database
        $catatan->delete();
        
        return redirect()->route('beranda')->with('success', 'Catatan berhasil dihapus');;
    }
}