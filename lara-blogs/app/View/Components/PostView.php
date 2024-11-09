<?php

namespace App\View\Components;

use App\Models\Post;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PostView extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {

        $posts = Post::When(request("keyword"), function ($q) {
            $keyword = request("keyword");
            $q->orWhere("title", "like", "%$keyword%")->orWhere(
                "description",
                "like",
                "%$keyword%"
            );
        })
            ->latest()
            ->with(["category","user"])
            ->paginate(10)
            ->withQueryString();

        return view('components.post-view',compact('posts'));
    }
}
