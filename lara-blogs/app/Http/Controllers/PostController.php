<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::latest()->paginate(10);
        return view("post.index", compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view("post.create", compact("categories"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $post = new Post();
        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        $post->description = $request->description;
        $post->excerpt = Str::words($request->description, 50, ' ...');
        $post->user_id = Auth::id();
        $post->category_id = $request->category;
        if ($request->hasFile('featured_image')) {
            $newName = uniqid() . "_featured_image." . $request->file('featured_image')->extension();
            // $request->file('featured_image')->store('/public', $newName);
            $request->file('featured_image')->store('image');

            // return $request;
            $post->featured_image = $request->featured_image;
        }
        $post->save();
        return redirect()->route("post.index")->with("status", $post->title . 'is added Successfully');
        // return $request->file();
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view("post.show", compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view("post.edit", compact("post"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        $post->description = $request->description;
        $post->excerpt = Str::words($request->description, 50, ' ...');
        $post->user_id = Auth::id();
        $post->category_id = $request->category;
        if ($request->hasFile('featured_image')) {
            //delete old photo
            if (isset($post->featured_image)) {

                Storage::delete($post->featured_image);
            }
            //update image
            $image = $request->file('featured_image')->store('image');
            $post->featured_image = $image;
        }
        $post->save();
        return redirect()->route("post.index")->with("status", $post->title . 'is updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $postTitle = $post->title;
        Storage::delete($post->featured_image);
        $post->delete();
        return redirect()->route('post.index')->with("status", $postTitle . 'is deleted successfully!');
    }
}
