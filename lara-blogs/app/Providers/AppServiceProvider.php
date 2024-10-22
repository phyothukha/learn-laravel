<?php

namespace App\Providers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        Gate::define('update-post', fn(User $user, Post $post) =>  $user->id === $post->user_id);

        Gate::define('delete-post', fn(User $user, Post  $post) => $user->id === $post->user_id);


        Blade::directive('myName', function ($x) {
            return 'Phyo Thu Kha' . $x;
        });

        Blade::if('aaa', fn($x) => $x);

        Blade::if('admin', function () {
            return Auth::user()->role === 'admin';
        });

        Blade::if('notAuthor', function () {
            return Auth::user()->role !== 'author';
        });
    }
}
