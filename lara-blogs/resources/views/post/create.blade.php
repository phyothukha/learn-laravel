<x-app-layout>

    <div class="breadcrumbs text-sm">
        <ul>
            <li><a>Home</a></li>
            <li>Posts</li>
        </ul>
    </div>
    <div class="max-w-7xl mx-auto">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg my-5">
            <div class="p-6 text-gray-900">
                <h4 class=" text-xl font-bold">Create Post</h4>
                <div class="divider"></div>
                <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <label class="form-control w-full max-w-full">
                        <div class=" label">
                            <span class="label-text @error('title') text-error @enderror ">Post Title</span>
                        </div>
                        <input id="title" name="title" type="text" placeholder="Type here"
                            value="{{ old('title') }}"
                            class="input input-bordered w-full max-w-full @error('title') input-error @enderror" />
                        @error('title')
                            <div class=" label">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </div>
                        @enderror
                    </label>
                    {{-- Category --}}
                    <label class="form-control w-full max-w-full">
                        <div class=" label">
                            <span class="label-text @error('category') text-error @enderror">Category</span>
                        </div>
                        <select name="category"
                            class="select select-bordered w-full max-w-full @error('category') select-error @enderror ">

                            @foreach (App\Models\Category::all() as $category)
                                <option value="{{ $category->id }}"
                                    {{ $category->id == old('category') ? 'selected' : '' }}>{{ $category->title }}
                                </option>
                            @endforeach
                        </select>
                        @error('category')
                            <div class=" label">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </div>
                        @enderror

                    </label>
                    {{-- Description --}}
                    <label class="form-control">
                        <div class="label">
                            <span class="label-text @error('description') text-error @enderror">Your bio</span>
                        </div>
                        <textarea name="description" class="textarea textarea-bordered @error('description') textarea-error @enderror"
                            rows="10"placeholder="Type Here">{{ old('description') }}</textarea>
                        @error('description')
                            <div class=" label">
                                <span class="label-text-alt text-error">{{ $message }}</span>

                            </div>
                        @enderror
                    </label>
                    <div class=" flex justify-between items-end">
                        <label class="form-control w-full max-w-xs">
                            <div class="label">
                                <span class="label-text @error('featured_image') text-error @enderror ">Pick
                                    a file</span>
                            </div>
                            <input type="file" name="featured_image" value="{{ old('featured_image') }}"
                                class="file-input file-input-bordered w-full max-w-xs @error('featured_image') file-input-error
                            @enderror" />
                            @error('featured_image')
                                <div class="label">
                                    <span class="label-text-alt text-error">{{ $message }}</span>
                                </div>
                            @enderror
                        </label>
                        <button type="submit" class=" btn btn-primary">Create Posts</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
