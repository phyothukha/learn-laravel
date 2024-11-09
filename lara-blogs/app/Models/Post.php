<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Self_;

class Post extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    public  function  scopeFilter($query,$filter){
        return $query->when($filter,function ($q,$search){
            $keyword= $search;
            $q->orWhere("title","like","%$keyword%")
                ->orWhere("description","like","%$keyword%");
        })->latest()
            ->with(["category",'user'])
            ->paginate(5)->withQueryString();
    }

    public  function  scopeAllFilter($query,$filter,$id){
        return $query->where(function ($q){
            $q->when(request("keyword"),function($q){
                $keyword= request("keyword");
                $q->orWhere("title","like","%$keyword%")
                    ->orWhere("description",'like',"%$keyword%");
            });
        })
            ->where('category_id',$id)->latest()
            ->with(['user','category'])
            ->paginate(10)->withQueryString();
    }



}
