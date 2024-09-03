<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PostController::class, "index"])->name("post.index");
Route::get('/create', [PostController::class, "create"])->name("post.create");
Route::post("/create", [PostController::class, "store"])->name("post.store");
Route::get('/show/{id}', [PostController::class, "show"])->name("post.show");
Route::delete("/destroy/{id}", [PostController::class, "destroy"])->name("post.destroy");
Route::get("/edit/{id}", [PostController::class, "edit"])->name("post.edit");
Route::put("/update/{id}", [PostController::class, "update"])->name("post.update");
