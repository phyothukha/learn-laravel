<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;
use Intervention\Image\Laravel\Facades\Image;

// Redirect root to login

Route::get('/',[PageController::class,"index"])->name("page.index");

Route::get("/detail/{id}",[PageController::class,"detail"])->name("page.detail");

Route::get("/categories/{category:slug}",[PageController::class,"postByCategory"])->name("page.category");


Route::get('dashboard',[\App\Http\Controllers\HomeController::class,'index'])
    ->middleware(['auth',"verified"])
    ->name("dashboard");

// Blog route, protected by authentication and email verification
Route::get("/blog", fn() => view("blog"))
    ->middleware(["auth", "verified"])
    ->name("blog");

Route::get("/file-test",fn()=> \Illuminate\Support\Facades\Storage::allFiles());

// Routes protected by authentication
Route::middleware("auth")->group(function () {
    // Profile routes
    Route::get("/profile", [ProfileController::class, "edit"])->name(
        "profile.edit"
    );
    Route::patch("/profile", [ProfileController::class, "update"])->name(
        "profile.update"
    );
    Route::delete("/profile", [ProfileController::class, "destroy"])->name(
        "profile.destroy"
    );


    // Category routes
    // ->middleware(Testing::class . ':10');

    // Post routes


});

require __DIR__ . "/auth.php";

require __DIR__ . "/admin.php";
