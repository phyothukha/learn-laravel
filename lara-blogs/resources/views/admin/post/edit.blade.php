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
                <h4 class=" text-xl font-bold">Edit Post</h4>
                <div class="divider"></div>
                <form action="{{ route('post.update', $post->id) }}" id="postUpdateForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                </form>

                    <label class="form-control w-full max-w-full">
                        <div class=" label">
                            <span class="label-text @error('title') text-error @enderror ">Post Title</span>
                        </div>
                        <input form="postUpdateForm"  id="title" name="title" type="text" placeholder="Type here"
                            value="{{ old('title', $post->title) }}"
                            class="input input-bordered w-full max-w-full @error('title') input-error @enderror" />
                        @error('title')
                            <div class=" label">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </div>
                        @enderror
                    </label>
                    <x-photo-delete :post="$post" />
                    <label class="form-control w-full max-w-full">
                        <div class="label">
                            <span class="label-text @error('photos') text-error @enderror ">Photos</span>
                        </div>
                        <input  form="postUpdateForm" type="file" name="photos[]" value="{{ old('photos') }}" multiple
                            class="file-input file-input-bordered w-full max-w-full @error('photos') file-input-error
                        @enderror" />
                        @error('photos')
                            <div class="label">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </div>
                        @enderror
                        @error('photos.*')
                            <div class="label">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </div>
                        @enderror
                    </label>
                    {{-- Category --}}
                    <label class="form-control w-full max-w-full">
                        <div class=" label">
                            <span class="label-text @error('category') text-error @enderror">Category</span>
                        </div>
                        <select
                            form="postUpdateForm"
                            name="category"
                            class="select select-bordered w-full max-w-full @error('category') select-error @enderror ">
                            @foreach (App\Models\Category::all() as $category)
                                <option value="{{ $category->id }}"
                                    {{ $category->id == old('category', $post->category_id) ? 'selected' : '' }}>
                                    {{ $category->title }}
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
                        <textarea form="postUpdateForm" name="description" class="textarea textarea-bordered @error('description') textarea-error @enderror"
                            rows="10"placeholder="Type Here">{{ old('description', $post->description) }}</textarea>
                        @error('description')
                            <div class=" label">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </div>
                        @enderror
                    </label>
                    <div class=" flex mt-4 gap-5 items-center">
                        @if (isset($post->featured_image))
                            <img src="{{ $post->featured_image }}" class=" h-[100px] w-[100px]  " alt="">
                        @endif
                        <label class="form-control w-full max-w-xs">
                            <div class="label">
                                <span class="label-text @error('featured_image') text-error @enderror ">Pick
                                    a file</span>
                            </div>
                            <input form="postUpdateForm" type="file" name="featured_image" value="{{ old('featured_image') }}"
                                class="file-input file-input-bordered w-full max-w-xs @error('featured_image') file-input-error
                            @enderror" />
                            @error('featured_image')
                                <div class="label">
                                    <span class="label-text-alt text-error">{{ $message }}</span>
                                </div>
                            @enderror
                        </label>
                    </div>


                    <button type="submit" form="postUpdateForm" class=" btn btn-primary  block ms-auto">Update Posts</button>

            </div>
        </div>
    </div>
</x-app-layout>
