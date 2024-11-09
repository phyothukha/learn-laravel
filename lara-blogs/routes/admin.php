<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NationController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use \App\Http\Controllers\CategoryController;

Route::group(["prefix" => "admin"], function () {Route::resource("category", CategoryController::class);
Route::resource("post", PostController::class);
Route::resource("photo", PhotoController::class);
Route::resource("user", UserController::class);
Route::resource("nation", NationController::class);
});
