@extends('layout.app')


@section('content')
    <div class=" m-5 border p-5 ">

        <form method="POST" action="{{ route('post.update', $post) }}" class=" space-y-4">
            @csrf
            @method('put')
            <h2 class=" text-lg font-bold">Edit Blogs Post</h2>
            <label class="form-control w-full max-w-md">
                <div class="label">
                    <span class="label-text">What is your name?</span>
                </div>

                <input value="{{ $post->title }}" name="title" type="text" placeholder="Type here"
                    class="input input-bordered w-full max-w-md" />
            </label>
            <label class="form-control w-full max-w-md">
                <div class="label">
                    <span class="label-text">What is your mind?</span>
                </div>
                <textarea name="description" class="textarea textarea-bordered h-24 max-w-md" placeholder="Enter Here" rows="5">{{ $post->description }}</textarea>
            </label>
            <button type="submit" class="btn btn-outline">Submit</button>
        </form>
    </div>
@endsection
