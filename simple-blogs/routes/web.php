<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


Route::redirect("/", "post");
Route::get("/users", [UserController::class, "index"])->name("user.index");

Route::resource("post", PostController::class);
