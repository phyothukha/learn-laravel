<x-app-layout>

    <div class="breadcrumbs text-sm">
        <ul>
            <li><a>Home</a></li>
            <li>Category</li>
        </ul>
    </div>
    <div class="max-w-7xl mx-auto my-3">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <h4 class=" text-xl font-bold">Create Category</h4>
                <div class="divider"></div>
                <form action="{{ route('category.store') }}" method="POST">
                    @csrf
                    <div class="join">
                        <div class=" form-control w-96">
                            <input name="title" value="{{ old('title') }}"
                                class="input w-full input-bordered bg-white  join-item @error('title')input-error
                            @enderror"
                                placeholder="Search" />
                            @error('title')
                                <div class="label">
                                    <span class="label-text-alt text-error">{{ $message }}</span>
                                </div>
                            @enderror
                        </div>
                        <button class="btn btn-primary join-item">Search</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
