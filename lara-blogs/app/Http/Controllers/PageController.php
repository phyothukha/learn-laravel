<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PageController extends Controller
{

    public function  index ()
    {

        $posts= Post::filter(request('keyword'));
        return view("index",compact("posts"));
    }
    public  function  detail($id)
    {

        $post= Post::where("id",$id)->with(['category','user','photos'])->first();

        return view("detail",compact("post"));

    }

    public  function postByCategory(Category $category)
    {
//        $posts= Post::where(function ($q){
//            $q->when(request("keyword"),function($q){
//                $keyword= request("keyword");
//                $q->orWhere("title","like","%$keyword%")
//                    ->orWhere("description",'like',"%$keyword%");
//            });
//        })
//        ->where('category_id',$category->id)->latest()
//        ->with(['user','category'])
//        ->paginate(10)->withQueryString();
//    $postCategory=$category->posts;
        $posts= Post::allFilter(request('keyword'),$category->id);
        return view('category.index',compact('posts','category'));
    }
}
