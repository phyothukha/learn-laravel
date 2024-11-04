<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PageController extends Controller
{

    public function  index ()
    {
        $posts= Post::when("keyword",function ($q){
            $keyword= request('keyword');
            $q->orWhere("title","like","%$keyword%")
            ->orWhere("description","like","%$keyword%");
          })->latest()
            ->with(["category",'user'])
            ->paginate(5)->withQueryString();
        return view("index",compact("posts"));
    }
    public  function  detail($id)
    {

        $post= Post::where("id",$id)->with(['category','user','photos'])->first();
//        return  $post;
        return view("detail",compact("post"));

    }
}
