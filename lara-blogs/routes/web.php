<?php

// use App\Http\Controllers\CategoryController;
// use App\Http\Controllers\PostController;
// use App\Http\Controllers\ProfileController;
// use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return redirect("login");
// });

// Route::get(
//     '/dashboard',
//     fn() => view('dashboard')
// )->middleware(['auth', 'verified'])->name('dashboard');


// Route::middleware("auth")->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


//     Route::get('/blog',  fn() => view('blog'))->middleware(['verified'])->name('blog');

//     Route::resource('category', CategoryController::class);
// });



use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Redirect root to login
Route::get('/', function () {
    return redirect('login');
});

// Dashboard route, protected by authentication and email verification
Route::get('/dashboard', fn() => view('dashboard'))->middleware(['auth', 'verified'])->name('dashboard');

// Blog route, protected by authentication and email verification
Route::get('/blog', fn() => view('blog'))->middleware(['auth', 'verified'])->name('blog');

// Routes protected by authentication
Route::middleware('auth')->group(function () {
    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Blog route (already defined)
    Route::get('/blog', fn() => view('blog'))->middleware(['verified'])->name('blog');

    // Category routes
    Route::resource('category', CategoryController::class);

    // Post routes
    Route::resource('post', PostController::class);
});







require __DIR__ . '/auth.php';
