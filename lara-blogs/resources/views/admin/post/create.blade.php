<x-app-layout>
    <x-bread-crumb :links="$links"/>
    <div class="max-w-7xl mx-auto">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg my-5">
            <div class="p-6 text-gray-900">
                <h4 class=" text-xl font-bold">Create Post</h4>
                <div class="divider"></div>
                <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <label class="form-control w-full max-w-full">
                        <x-input name="title" label="Post Title"/>
                    </label>

                    <label class="form-control w-full max-w-full">
                        <div class="label">
                            <span class="label-text @error('photos') text-error @enderror ">Photos</span>
                        </div>
                        <input type="file" name="photos[]" value="{{ old('photos') }}"
                               multiple
                               class="file-input file-input-bordered w-full max-w-full @error('photos') file-input-error
                        @enderror"/>
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
                        <select name="category"
                                class="select select-bordered w-full max-w-full @error('category') select-error @enderror ">
                            @foreach ($categories as $category)
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
                        <textarea name="description"
                                  class="textarea textarea-bordered @error('description') textarea-error @enderror"
                                  rows="10" placeholder="Type Here">{{ old('description') }}</textarea>
                        @error('description')
                        <div class=" label">
                            <span class="label-text-alt text-error">{{ $message }}</span>

                        </div>
                        @enderror
                    </label>
                    <div class=" flex justify-between items-end">
                        <label class="form-control w-full max-w-xs">
                            <x-input name="featured_image" type="file" label="Pick a file"/>
                        </label>
                        <button type="submit" class=" btn btn-primary">Create Posts</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
