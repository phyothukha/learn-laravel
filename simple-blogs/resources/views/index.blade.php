@extends('app')
@section('title')
    Sample Blogs
@endsection

@section('content')
    <div class=" container mx-auto m-3">
        <div class="card my-5 rounded-md shadow-md">
            <div class="card-body">
                <div class=" flex justify-between">
                    <div>
                        <h2 class="card-title">Hello!</h2>
                        <p>What is on your mind?...</p>
                    </div>
                    <div class=" card-actions">
                        <a href="{{ route('post.create') }}" class=" btn btn-outline btn-outline-primary" href="">Create
                            Contact</a>
                    </div>
                </div>
            </div>
        </div>
        <div class=" space-y-5">

            @if (session('status'))
                <div role="alert" class="alert alert-info rounded-md">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        class="h-6 w-6 shrink-0 stroke-current">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span>{{ session('status') }}</span>
                </div>
            @endif

            @foreach ($posts as $post)
                <div class="card my-5 rounded-md border  ">
                    <div class="card-body">
                        <div class=" flex justify-between">
                            <div>
                                <h2 class="card-title mb-2 ">{{ $post->title }}!</h2>
                                <p>{{ Str::words($post->description, 15) }}</p>
                            </div>
                        </div>
                        <p>{{ $post->created_at->format('d M Y | n : i A ') }}</p>
                        <div class=" text-end">
                            <form action="{{ route('post.destroy', $post->id) }}" method="POST" class=" inline-block">
                                @csrf
                                @method('delete')
                                <button class=" btn btn-outline btn-error btn-sm">Delete</button>
                            </form>
                            <a href="{{ route('post.edit', $post->id) }}" class=" btn-sm btn btn-outline btn-info">Edit</a>
                            <a href="{{ route('post.show', $post->id) }}"
                                class=" btn btn-outline btn-sm btn-outline-primary">See More</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class=" mt-5">
            {{ $posts->links('') }}
        </div>

    </div>
@endsection
