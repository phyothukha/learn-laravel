<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/posts',[\App\Http\Controllers\PostApiController::class,'index']);
Route::get('/post/{slug}',[\App\Http\Controllers\PostApiController::class,'show']);
