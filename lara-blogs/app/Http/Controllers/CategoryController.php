<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::latest("id")->get();
        return view("category.index", compact("categories"));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("category.create");
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
        return redirect()->route("category.index")->with("status", $category->title . " is Added Successfully!");
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return abort(500);
        // return $category;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        // dd($category);

        return view("category.edit", compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->title = $request->title;
        $category->slug = Str::slug($request->title);
        $category->update();
        return redirect()->route("category.index")->with("status", $category->title . "is updated Successfully!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $categoryTitle = $category->title;
        $category->delete();
        return redirect()->route("category.index")->with("status", $categoryTitle . ' is deleted Successfully!');
    }
}
