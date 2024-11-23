<div class="flex w-full gap-3">
    <div class="w-1/4 border p-2 min-h-screen my-3 bg-white overflow-hidden shadow-sm">
        <div class="flex flex-col gap-y-2 h-full">
            <div class="flex flex-col gap-2">
                <p>Dashboard link</p>
                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    {{ __('Dashboard') }}
                </x-nav-link>
                <x-nav-link :href="route('blog')" :active="request()->routeIs('blog')">
                    {{ __('Blog') }}
                </x-nav-link>

                <x-nav-link :href="route('photo.index')" :active="request()->routeIs('photo.index')">
                    {{ __('Gallery') }}
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
                <x-nav-link :href="route('post.create')" :active="request()->routeIs('post.create')">
                    {{ __('Add Post') }}
                </x-nav-link>
                <x-nav-link :href="route('post.index')"
                :active="request()->routeIs('post.index') && !request()->has('trash')"
                >

                    {{ __('Posts') }}
                </x-nav-link>
                <x-nav-link
                    :href="route('post.index', ['trash' => true])"
                    :active="request()->fullUrlIs(route('post.index', ['trash' => true]))">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4 inline">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                    </svg>
                    {{ __('Deleted Post') }}
                </x-nav-link>

            </div>
            <div class="flex flex-col gap-2">
                <p>User Management</p>
                <x-nav-link :href="route('user.index')" :active="request()->routeIs('user.index')">
                    {{ __('Users') }}
                </x-nav-link>

            </div>

        </div>
    </div>
    <div class="w-3/4">
        {{ $slot }}
    </div>
</div>
