<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;


Route::redirect("/", "post");

Route::resource("post", PostController::class);
