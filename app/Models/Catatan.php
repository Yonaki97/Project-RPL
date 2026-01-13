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


    //like
    public function likes()
    {
    return $this->hasMany(Like::class, 'catatan_id', 'id');
    }

    //bookmark
    public function bookmarks()
    {
    return $this->hasMany(Bookmark::class, 'catatan_id', 'id');
    }
    public function lampirans()
    {
    return $this->hasMany(Lampiran::class);
    }
    // Method helper untuk cek apakah catatan sudah dibookmark oleh user tertentu
    public function isBookmarkedBy($userId)
    {
        return $this->bookmarks()->where('id_user', $userId)->exists();
    }
}