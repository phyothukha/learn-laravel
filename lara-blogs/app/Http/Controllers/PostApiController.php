<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostApiController extends Controller
{
public  function  index()
{
    $posts= Post::when(request('keyword'),function($q){
        $keyword= request('keyword');

        $q->orwhere('title','like',"$keyword%")
            ->orWhere("description","like","%$keyword%");
    })->latest()->with(["category","user"])
        ->paginate(10)
        ->withQueryString();

    return response()->json($posts);
}

public  function show($slug){
    $post= Post::where('slug',$slug)->with(["category","user"])->first();

    return response()->json($post);
}

}
