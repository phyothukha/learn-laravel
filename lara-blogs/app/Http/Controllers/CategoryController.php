<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class CategoryController extends Controller
{
    function __construct()
    {
        // $this->middleware('testing:10');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::latest("id")
            ->when(
                Auth::user()->role === "author",
                fn($q) => $q->where("user_id", Auth::id())
            )
            ->with('user')->withCount("posts")
            ->get();

        $links= ['category'=>route('category.index')];
        return view("admin.category.index", compact("categories",'links'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $links= ['category'=>route('category.index'),'create-category'=>route('category.create')];


        return view("admin.category.create",compact('links'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $category = new Category();
        $category->title = $request->title;
        $category->slug = Str::slug($request->title);
        $category->user_id = Auth::id();
        $category->save();
        return redirect()
            ->route("category.index")
            ->with("status", $category->title . " is Added Successfully!");
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return $category->posts;
        // return $category;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        Gate::authorize("update", $category);
        $links= ['category'=>route('category.index'),"Edit Category"=>route('category.edit', $category)];
        return view("admin.category.edit", compact("category",'links'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        Gate::authorize("update", $category);
        $category->title = $request->title;
        $category->slug = Str::slug($request->title);
        $category->update();
        return redirect()
            ->route("category.index")
            ->with("status", $category->title . "is updated Successfully!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        Gate::authorize("delete", $category);
        $categoryTitle = $category->title;
        $category->delete();
        return redirect()
            ->route("category.index")
            ->with("status", $categoryTitle . " is deleted Successfully!");
    }
}
