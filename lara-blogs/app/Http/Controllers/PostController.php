<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Category;
use App\Models\Photo;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
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
        $posts = Post::search()
            ->when(request()->trash,function($query){
                $query->onlyTrashed();
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();
        $links=["posts"=>route('post.index')];
        return view("admin.post.index",compact('posts','links'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();

        $links=["posts"=>route('post.index'),"create"=>route('post.create')];

        return view("admin.post.create", compact("categories",'links'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {

//        DB::transaction(function(){

        try {

        Db::beginTransaction();
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
        $savedPhoto=[];
        foreach ($request->photos as $key=>$photo) {
            $postPhoto = $photo->store("photo");
            $photoPost='/storage/'.$postPhoto;
            $savedPhoto[$key]= [
                "post_id"=>$post->id,
                "name"=>$photoPost,
            ];
        }

        Photo::insert($savedPhoto);
        return redirect()
            ->route("post.index")
            ->with("status", $post->title . "is added Successfully");
//        });
            DB::commit();

        }catch(\Exception $exception){
DB::rollBack();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        Gate::authorize("view", $post);
        $links=["posts"=>route('post.index'),"Detail Post"=>route('post.show', $post)];
        return view("admin.post.show", compact("post","links"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $links=["posts"=>route('post.index'),'Edit Post'=>route('post.edit', $post)];
        return view("admin.post.edit", compact("post","links"));
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
            $photo->post_id = $post->id;
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
    public function destroy($id)
    {
      $post=  Post::withTrashed()->findOrFail($id)->first();
        if (Gate::denies("delete", $post)) {
            return abort(403, "U are not allowed to delete");
        }
        $postTitle = $post->title;
        if(request()->delete==='force'):

        File::delete(public_path($post->featured_image));
        File::delete($post->photos->map(fn($photo)=>public_path($photo->name))->toArray());
        Photo::where("post_id",$post->id)->delete();
        Post::withTrashed()->findOrFail($id)->forceDelete();
        return redirect()
            ->route("post.index")
            ->with("status", $postTitle . "is deleted successfully!");
        elseif (request()->delete==='restore'):

        Post::withTrashed()->findOrFail($id)->restore();
        return redirect()
                ->route("post.index")
                ->with("status", $postTitle . "is restore successfully!");
        else:
            Post::withTrashed()->findOrFail($id)->delete();
        return redirect()
            ->route('post.index')
            ->with('status', $postTitle . "is soft deleted successfully!");
        endif;
    }
}
