<x-app-layout xmlns:x-slot="http://www.w3.org/1999/xlink">
<x-bread-crumb :links="$links"/>

   <div class="max-w-7xl mx-auto my-3">
        <x-card>
            <x-slot:title>Post Detail</x-slot:title>
            <div class=" space-x-2 my-5">
                <div class="badge badge-outline space-x-1">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="size-3">
                        <path fill-rule="evenodd"
                              d="M4.5 2A2.5 2.5 0 0 0 2 4.5v2.879a2.5 2.5 0 0 0 .732 1.767l4.5 4.5a2.5 2.5 0 0 0 3.536 0l2.878-2.878a2.5 2.5 0 0 0 0-3.536l-4.5-4.5A2.5 2.5 0 0 0 7.38 2H4.5ZM5 6a1 1 0 1 0 0-2 1 1 0 0 0 0 2Z"
                              clip-rule="evenodd"/>
                    </svg>
                    <span>
                            {{ $post->category->title }}
                        </span>
                </div>
                <div class="badge badge-outline space-x-1">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="size-3">
                        <path
                            d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6ZM12.735 14c.618 0 1.093-.561.872-1.139a6.002 6.002 0 0 0-11.215 0c-.22.578.254 1.139.872 1.139h9.47Z"/>
                    </svg>
                    <span>
                            {{ $post->user->name }}
                        </span>
                </div>
                <div class="badge badge-outline space-x-1">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="size-3">
                        <path fill-rule="evenodd"
                              d="M4 1.75a.75.75 0 0 1 1.5 0V3h5V1.75a.75.75 0 0 1 1.5 0V3a2 2 0 0 1 2 2v7a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2V1.75ZM4.5 6a1 1 0 0 0-1 1v4.5a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1h-7Z"
                              clip-rule="evenodd"/>
                    </svg>

                    <span>
                            {{ $post->created_at->format('d M, Y') }}
                        </span>
                </div>
                <div class="badge badge-outline space-x-1">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="size-3">
                        <path fill-rule="evenodd"
                              d="M1 8a7 7 0 1 1 14 0A7 7 0 0 1 1 8Zm7.75-4.25a.75.75 0 0 0-1.5 0V8c0 .414.336.75.75.75h3.25a.75.75 0 0 0 0-1.5h-2.5v-3.5Z"
                              clip-rule="evenodd"/>
                    </svg>

                    <span>
                            {{ $post->created_at->format('h : m A') }}

                        </span>
                </div>

            </div>
            @if ($post->featured_image)
                <img src="{{ $post->featured_image }}" class=" w-full h-full object-fill my-10" alt="">
            @endif
            <h1 class=" font-bold text-lg mb-2">{{ $post->title }}</h1>
            <p class=" text-sm font-medium text-base-content leading-loose">{{ $post->description }}</p>
            @foreach ($post->photos as $photo)
                <img src="{{ $photo->name }}" class=' w-[80px] h-[80px] inline-flex object-contain  my-4 '/>
            @endforeach
            <div class=" w-full flex justify-between my-5">
                <a href="{{ route('post.create') }}" class=" btn btn-outline-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="size-4">
                        <path
                            d="M8.75 3.75a.75.75 0 0 0-1.5 0v3.5h-3.5a.75.75 0 0 0 0 1.5h3.5v3.5a.75.75 0 0 0 1.5 0v-3.5h3.5a.75.75 0 0 0 0-1.5h-3.5v-3.5Z"/>
                    </svg>
                    Create Post</a>
                <a href="{{ route('post.index') }}" class=" btn btn-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="size-4">
                        <path
                            d="M3 4.75a1 1 0 1 0 0-2 1 1 0 0 0 0 2ZM6.25 3a.75.75 0 0 0 0 1.5h7a.75.75 0 0 0 0-1.5h-7ZM6.25 7.25a.75.75 0 0 0 0 1.5h7a.75.75 0 0 0 0-1.5h-7ZM6.25 11.5a.75.75 0 0 0 0 1.5h7a.75.75 0 0 0 0-1.5h-7ZM4 12.25a1 1 0 1 1-2 0 1 1 0 0 1 2 0ZM3 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2Z"/>
                    </svg>
                    Post Lists</a>
            </div>
        </x-card>
    </div>
</x-app-layout>
