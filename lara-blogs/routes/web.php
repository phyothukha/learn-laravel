<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NationController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\Testing;
use Illuminate\Support\Facades\Route;

// Redirect root to login
Route::get("/", function () {
    return redirect("login");
});

// Dashboard route, protected by authentication and email verification
Route::get("/dashboard", fn() => view("dashboard"))
    ->middleware(["auth", "verified"])
    ->name("dashboard");

// Blog route, protected by authentication and email verification

Route::get("/blog", fn() => view("blog"))
    ->middleware(["auth", "verified"])
    ->name("blog");

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
    Route::resource("category", CategoryController::class);
    // ->middleware(Testing::class . ':10');

    // Post routes
    Route::resource("post", PostController::class);

    Route::resource("user", UserController::class);
    Route::resource("nation", NationController::class);
});

require __DIR__ . "/auth.php";
