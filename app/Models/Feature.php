<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    protected $fillable = [
        'like',
        'comment',
        'bookmark'
    ];

    public function catatans()
    {
        return $this->hasMany(Catatan::class, 'id_kategori');
    }
    public function users(){
        return $this->hasMany(users::class, 'id_user');
    }
}