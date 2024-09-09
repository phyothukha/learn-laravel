<div class="navbar bg-base-200 shadow-md">
    <div class="flex-1">
        <a href="{{ route('post.index') }}" class="btn btn-ghost text-xl">daisyUI</a>
    </div>
    <div class="flex-none">
        <ul class="menu menu-horizontal px-1">
            <li><a href="{{ route('post.create') }}">Create Blogs</a></li>
            <li><a href="{{ route('post.index') }}">Home</a></li>
        </ul>
    </div>
</div>
