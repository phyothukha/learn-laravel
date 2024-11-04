<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Category;
use App\Models\Photo;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::When(request("keyword"), function ($q) {
            $keyword = request("keyword");
            $q->orWhere("title", "like", "%$keyword%")->orWhere(
                "description",
                "like",
                "%$keyword%"
            );
        })
            ->latest()
            ->with(["category","user"])
            ->paginate(10)
            ->withQueryString();
        return view("post.index", compact("posts"));
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
        $post->excerpt = Str::words($request->description, 50, " ...");
        $post->user_id = Auth::id();
        $post->category_id = $request->category;
        if ($request->hasFile("featured_image")) {
            $image = $request->file("featured_image")->store("image");
            $post->featured_image = "/storage/" . $image;
        }
        $post->save();

        foreach ($request->photos as $photo) {
            // 1) saving file in storage
            $postPhoto = $photo->store("photo");
$photoPost='/storage/'.$postPhoto;

            // 2) saving database field name
            $photo = new Photo();
            $photo->Post_id = $post->id;
            $photo->name = $photoPost;
            $photo->save();
        }

        return redirect()
            ->route("post.index")
            ->with("status", $post->title . "is added Successfully");
        // return $request->file();
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        Gate::authorize("view", $post);
        return view("post.show", compact("post"));
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
        if (Gate::denies("update", $post)) {
            return abort(403, "U are not allowed to update!");
        }
        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        $post->description = $request->description;
        $post->excerpt = Str::words($request->description, 50, " ...");
        $post->user_id = Auth::id();
        $post->category_id = $request->category;
        if ($request->hasFile("featured_image")) {
            if (isset($post->featured_image)) {
                Storage::delete($post->featured_image);
            }
            // update image
            $image = $request->file("featured_image")->store("image");
            $post->featured_image = "/storage/" . $image;
        }

        if($request->photos){

        foreach ($request->photos as $photo) {
            // 1) saving file in storage
            $postPhoto = $photo->store("photo");
            $photoPost='/storage/'.$postPhoto;

            // 2) saving database field name
            $photo = new Photo();
            $photo->Post_id = $post->id;
            $photo->name = $photoPost;
            $photo->save();
        }
        }

        $post->save();

        return redirect()
            ->route("post.index")
            ->with("status", $post->title . "is updated Successfully!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if (Gate::denies("delete", $post)) {
            return abort(403, "U are not allowed to delete");
        }
        $postTitle = $post->title;
        Storage::delete('image/'. $post->featured_image);

        foreach ($post->photos as $photo) {
            Storage::delete('photo/'.$photo->name);
            $photo->delete();
        }
        $post->delete();
        return redirect()
            ->route("post.index")
            ->with("status", $postTitle . "is deleted successfully!");
    }
}
