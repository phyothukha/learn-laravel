<x-app-layout>

<x-bread-crumb :links="$links">
    <div class="max-w-7xl mx-auto my-3">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <h1 class=" text-xl font-bold">Update Category</h1>
                <div class="divider"></div>
                <form action="{{ route('category.update', $category->id) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="join">
                        <div class=" form-control w-96">
                            <x-input name="title"  :default="$category->title"  :show="false" />
                        </div>
                        <button class="btn btn-primary join-item">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
