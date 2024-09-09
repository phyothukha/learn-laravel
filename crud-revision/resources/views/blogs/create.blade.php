@extends('layout.app')


@section('content')
    <div class=" m-5 border p-5 ">

        @if ($errors->any())
            <div role="alert" class="alert alert-error rounded-md">
                <ul class=" space-y-2">
                    @foreach ($errors->all() as $error)
                        <li class=" flex gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span>{{ $error }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('post.store') }}" class=" space-y-4">
            @csrf
            <h2 class=" text-lg font-bold">Create Blogs Post</h2>
            <label class="form-control w-full max-w-md">
                <div class="label">
                    <span
                        class="label-text @error('title')
                        text-error
                        @enderror ">What
                        is your
                        name?</span>
                </div>
                <input name="title" type="text" placeholder="Type here" value="{{ old('title') }}"
                    class="input input-bordered w-full max-w-md @error('title')
                 input-error
                @enderror " />
                @error('title')
                    <div class=" label">
                        <span class="label-text text-error ">{{ $message }}</span>
                    </div>
                @enderror

            </label>
            <label class="form-control w-full max-w-md">
                <div class="label">
                    <span
                        class="label-text @error('title')
                    text-error
                    @enderror">What
                        is your mind?</span>
                </div>
                <textarea name="description"
                    class="textarea textarea-bordered h-24 max-w-md @error('description')

                    textarea-error
                @enderror "
                    placeholder="Enter Here" rows="5">
                {{ old('description') }}
                </textarea>
                @error('description')
                    <div class=" label">
                        <span class="label-text text-error ">{{ $message }}</span>
                    </div>
                @enderror
            </label>
            <button type="submit" class="btn btn-outline">Submit</button>
        </form>
    </div>
@endsection
