<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Catatan extends Model
{
    protected $fillable = [
        'judul',
        'id_kategori',
        'isi',
        'lampiran',
        'id_user'
    ];
    
    // memberi
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }
    public function user(){
        return $this->belongsTo(User::class, 'id_user');
    }

    // mengambil 
    public function likes(){
        return $this->hasMany(Like::class);
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }
    public function bookmarks(){
        return $this->hasMany(Bookmark::class);
    }
    public function lampirans()
{
    return $this->hasMany(Lampiran::class);
}
}