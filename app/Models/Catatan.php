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
        'id_user',
        'hash_dokumen',
        'digital_signature'
    ];

    // memberi
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'catatan_id')->latest();
    }

    // like
    public function likes()
    {
        return $this->hasMany(Like::class, 'catatan_id', 'id');
    }

    // bookmark
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

    // Method helper untuk cek apakah catatan sudah di-like oleh user tertentu
    public function isLikedBy($userId)
    {
        if (! $userId) {
            return false;
        }

        return $this->likes()
            ->where('id_user', $userId)
            ->exists();
    }
}
