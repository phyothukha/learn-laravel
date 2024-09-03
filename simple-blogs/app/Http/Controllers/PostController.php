<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function index()
    {
        $posts = Post::all();
        return view("index", compact("posts"));
    }
    public function show($id)
    {
        $post = Post::find($id);
        return view("show", compact("post"));
    }

    public function create()
    {
        return view("create");
    }

    public function store(Request $request)
    {

        $post = new Post();
        $post->title = $request->title;
        $post->description = $request->description;
        $post->save();
        return redirect()->route("post.index")->with("status", "Post Created successfully!");
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return  redirect()->route("post.index")->with("status", "Post Deleted successfully!");
    }

    public function edit($id)
    {
        $post = Post::find($id);
        return view("edit", compact("post"));
    }
    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $post->title = $request->title;
        $post->description = $request->description;
        $post->update();
        return redirect()->route("post.index")->with("status", "Post updated successfully!");
    }
}
