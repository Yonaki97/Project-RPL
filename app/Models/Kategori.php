<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $fillable = [
        'jurusan',
    ];

    public function catatans()
    {
        return $this->hasMany(Catatan::class, 'id_kategori');
    }
}