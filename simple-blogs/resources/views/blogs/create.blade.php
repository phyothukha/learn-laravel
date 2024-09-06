@extends('template.app')

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

                @if ($errors->any())
                    <div role="alert" class="alert alert-error rounded-md">
                        <ul class=" space-y-2">
                            @foreach ($errors->all() as $error)
                                <li class=" flex gap-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current"
                                        fill="none" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span>{{ $error }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('post.store') }}" method="POST" class=" w-full space-y-3">
                    @csrf
                    <label class="form-control w-full ">
                        <div class="label">
                            <span class="label-text @error('title') text-error @enderror">Title</span>
                        </div>
                        <input name="title" type="text" placeholder="Enter Title" value="{{ old('title') }}"
                            class="input input-bordered w-full
                            @error('title')
                            input-error
                            @enderror
                            " />
                        @error('title')
                            <div class="label">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </div>
                        @enderror
                    </label>
                    <label class="form-control w-full ">
                        <div class="label">
                            <span class="label-text @error('title') text-error @enderror ">Description</span>
                        </div>
                        <textarea name="description" rows="5" placeholder="Enter Description"
                            class="textarea textarea-bordered textarea-lg w-full  @error('description') textarea-error @enderror ">
{{ old('description') }}
                        </textarea>
                        @error('description')
                            <div class="label ">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </div>
                        @enderror

                    </label>
                    <div class=" text-end">
                        <button type="submit" class=" btn btn-outline btn-outline-secondary">Submit</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection
