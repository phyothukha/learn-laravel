<x-app-layout>

   <x-bread-crumb :links="$links"/>
    <div class="max-w-7xl mx-auto my-3">
        <x-card>
            <x-slot:title>
                Create Category
            </x-slot:title>
            <form action="{{ route('category.store') }}" method="POST">
                @csrf
                <div class="join">
                    <div class=" form-control w-96">
                        <x-input name="title" :show="false" />
                    </div>
                    <button class="btn btn-primary join-item">Create</button>
                </div>
            </form>
        </x-card>
    </div>
</x-app-layout>
