@extends('app')

@section('title')
    Create Posts
@endsection

@section('content')
    <div class=" container mx-auto">
        <div class="card my-5 rounded-md shadow-md">
            <div class="card-body">
                <div class=" flex justify-between items-center">
                    <div>
                        <h2 class="card-title">Create New Post!</h2>
                    </div>
                    <div class="card-actions justify-end">
                        <a href="{{ route('post.index') }}" class="btn btn-outline btn-outline-primary">Home</a>
                    </div>
                </div>

                <form action="{{ route('post.store') }}" method="POST" class=" w-full space-y-3">
                    @csrf
                    <label class="form-control w-full ">
                        <div class="label">
                            <span class="label-text">Title</span>
                        </div>
                        <input name="title" type="text" placeholder="Enter Title"
                            class="input input-bordered w-full " />
                    </label>
                    <label class="form-control w-full ">
                        <div class="label">
                            <span class="label-text">Description</span>
                        </div>
                        <textarea name="description" rows="5" placeholder="Enter Description"
                            class="textarea textarea-bordered textarea-lg w-full"></textarea>
                    </label>
                    <div class=" text-end">
                        <button type="submit" class=" btn btn-outline btn-outline-secondary">Submit</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection
