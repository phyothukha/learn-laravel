<div class="flex w-full gap-3">
    <div class="w-1/4 border p-2 max-h-screen bg-white overflow-hidden shadow-sm">
        <div class="flex flex-col gap-y-2 h-full">
            <div class="flex flex-col gap-2">
                <p>Dashboard link</p>
                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    {{ __('Dashboard') }}
                </x-nav-link>
                <x-nav-link :href="route('blog')" :active="request()->routeIs('blog')">
                    {{ __('Blog') }}
                </x-nav-link>
            </div>
            <div class="flex flex-col gap-2">
                <p>Category Management</p>
                <x-nav-link :href="route('category.index')" :active="request()->routeIs('category.index')">
                    {{ __('Category') }}
                </x-nav-link>
                <x-nav-link :href="route('category.create')" :active="request()->routeIs('category.create')">
                    {{ __('Add Category') }}
                </x-nav-link>
            </div>

            <div class="flex flex-col gap-2">
                <p>Post Management</p>
                <x-nav-link :href="route('post.index')" :active="request()->routeIs('post.index')">
                    {{ __('Posts') }}
                </x-nav-link>
                <x-nav-link :href="route('post.create')" :active="request()->routeIs('post.create')">
                    {{ __('Add Post') }}
                </x-nav-link>
            </div>
        </div>
    </div>
    <div class="w-3/4">
        {{ $slot }}
    </div>
</div>
