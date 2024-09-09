<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

use function PHPUnit\Framework\returnSelf;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::paginate(5);
        return  view("index", compact("posts"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "title" => "bail|required|unique:posts,title|min:10",
            "description" => "required|min:10",
        ]);

        Post::create([
            "title" => $request->title,
            "description" => $request->description
        ]);
        return redirect()->route("post.index")->with("status", "Post Create Successfully!");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::find($id);
        return view("show", compact("post"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $post = Post::find($id);
        return view("edit", compact("post"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //

        $post = Post::findOrFail($id);
        $post->title = $request->title;
        $post->description = $request->description;
        $post->update();
        return redirect()->route("post.index")->with("status", "Post Updated Successfully!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $post = Post::findOrFail($id);

        $post->delete();

        return redirect()->route("post.index")->with("status", "Post Deleted Successfully!");
    }
}