<x-app-layout>

    <div class="breadcrumbs text-sm">
        <ul class=" text-base-200">
            <li><a>Home</a></li>
            <li>Posts</li>
        </ul>
    </div>
    <div class="max-w-7xl mx-auto my-3">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <h4 class=" text-xl font-bold">Create Post</h4>
                <div class="divider"></div>
                <form action="{{ route('post.create') }}" method="POST">
                    @csrf

                    <label class="form-control w-full max-w-full">
                        <div class="label">
                            <span class="label-text" aria-label="title">Post Title</span>
                        </div>
                        <input id="title" type="text" placeholder="Type here"
                            class="input input-bordered w-full max-w-full" />
                    </label>
                    <label class="form-control w-full max-w-full">
                        <div class="label">
                            <span class="label-text" aria-label="category">Category</span>
                        </div>
                        <input id="category" type="text" placeholder="Type here"
                            class="input input-bordered w-full max-w-full" />
                    </label>
                    <label class="form-control w-full max-w-full">
                        <div class="label">
                            <span class="label-text" aria-label="category">Category</span>
                        </div>
                        <input id="category" type="text" placeholder="Type here"
                            class="input input-bordered w-full max-w-full" />
                    </label>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
