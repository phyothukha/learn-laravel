<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function post()
    {
        return $this->hasOne(Post::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

//Lorem Ipsum Nay Kaun g Lar Bar Nyar Thar Ra Kar Nay Kyer Kwar Si Taing Gyi Pell Lhlowl. ! htoke Mha 100 Bl , Ma Kyike Yin Pyn ll> Ok Lar
