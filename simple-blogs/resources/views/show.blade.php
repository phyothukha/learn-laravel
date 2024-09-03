@extends('app')
@section('title')
@endsection

@section('content')
    <div class=" container mx-auto m-3">
        <div class="card my-5 rounded-md shadow-md">
            <div class="card-body">
                <div class=" flex justify-between">
                    <div>
                        <h2 class="card-title">Post Detail!</h2>
                        <p>What is on your mind?...</p>
                    </div>
                    <div class=" card-actions">
                        <a href="{{ route('post.index') }}" class=" btn btn-outline btn-outline-primary">Home</a>
                    </div>
                </div>
            </div>
        </div>
        <div class=" space-y-5">
            <div class="card my-5 rounded-md border  ">
                <div class="card-body">
                    <div class=" flex justify-between">
                        <div>
                            <h2 class="card-title mb-2">{{ $post->title }}!</h2>
                            <p>{{ $post->description }}</p>
                        </div>
                    </div>

                    <p>{{ $post->created_at->format('d M Y | n : i A ') }}</p>

                </div>
            </div>

        </div>

    </div>
@endsection
