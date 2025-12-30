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
    
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }
    public function user(){
        return $this->belongsTo(User::class, 'id_user');
    }
}