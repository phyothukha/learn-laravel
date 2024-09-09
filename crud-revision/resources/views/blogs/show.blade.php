@extends('layout.app')


@section('content')
    <div>
        <div class="hero bg-white min-h-screen">
            <div class="hero-content text-center">
                <div class="max-w-md">
                    <h1 class="text-5xl font-bold">{{ $post->title }}</h1>
                    <p class="py-6">
                        {{ $post->description }}
                    </p>
                    <a href="{{ route('post.index') }}" class="btn btn-primary">Go Home</a>
                </div>
            </div>
        </div>
    </div>
@endsection
