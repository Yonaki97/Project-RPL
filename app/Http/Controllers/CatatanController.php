<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class CatatanController extends Controller
{
    public function create()
    {
        return view('catatan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
        'judul'      => 'required|string|max:255',
        'kategori_id'=> 'required',
        'isi'        => 'nullable|string',
        'lampiran'   => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:10240'
        ]);

        $path=null;
        if($request->hasFile('lampiran')){
            $path=$request->file('lampiran')
                          ->store('lampiran_catatan', 'public');
        }
        catatan:create([
            'judul' -> $request->judul,
            'kategori_id' -> $request->kategori_id,
            'isi' -> $request->isi,
            'lampiran' -> $request->$path
        ]);
        return redirect()->back()->with('Succes','Catatan berhasil disimpan');
    }
}
