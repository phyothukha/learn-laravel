<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return view("blogs.index", compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("blogs.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "title" => "required|unique:posts,title|min:10",
            "description" => "required|min:10",
        ]);
        Post::create([
            "title" => $request->title,
            "description" => $request->description
        ]);
        return redirect()->route("post.index")->with("status", "Create Successfully!");
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $post = Post::find($post->id);
        return view("blogs.show", compact("post"));
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $post = Post::findOrFail($post->id);
        return view("blogs.edit", compact("post"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {

        $post->update([
            "title" => $request->title,
            "description" => $request->description,
        ]);
        return redirect()->route("post.index")->with("status", "Update Successfully");
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route("post.index")->with("status", "Delete successfully!");
    }
}
