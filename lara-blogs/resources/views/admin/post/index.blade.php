<x-app-layout>

    <x-bread-crumb :links="$links"/>

    <div class="max-w-7xl mx-auto my-3">
        <x-card>
            <x-slot:title>Post Lists</x-slot:title>
            <div class=" flex justify-between items-center my-3">
                <div class=" flex items-center gap-2">
                    @if (request('keyword'))
                        <h4>Search By : {{ request('keyword') }}</h4>
                        <a href="{{ route('post.index') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor"
                                 class="size-4">
                                <path
                                    d="M5.28 4.22a.75.75 0 0 0-1.06 1.06L6.94 8l-2.72 2.72a.75.75 0 1 0 1.06 1.06L8 9.06l2.72 2.72a.75.75 0 1 0 1.06-1.06L9.06 8l2.72-2.72a.75.75 0 0 0-1.06-1.06L8 6.94 5.28 4.22Z"/>
                            </svg>
                        </a>
                    @endif
                </div>
                <form class="join" action="{{ route('post.index') }}" method="get">
                    <input value="{{ request('keyword') }}" class="input input-bordered join-item" name="keyword"
                           required placeholder="Search here "/>
                    <button class="btn join-item rounded-md" type="submit">Subscribe</button>
                </form>
            </div>
            <div class="overflow-x-auto">
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th class=" w-56">title</th>
                        <th>Category</th>
                        @admin
                        <th>Owner</th>
                        @endadmin
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($posts as $post)
                        <tr>
                            <th>{{ $post->id }}</th>
                            <td>{{ $post->title }}</td>
                            @admin
                            <td>
                                {{$post->category->title}}
                            </td>
                            @endadmin
                            <td>
                                {{$post->user->name}}
                            </td>
                            <td class=" w-40">
                                {!! $post->time !!}
                            </td>
                            <td class="">
                                <a href="{{ route('post.show', $post->id) }}"
                                   class=" btn btn-outline  btn-primary btn-xs">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor" class="size-3">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                    </svg>

                                </a>

                                @can('update', $post)
                                    <a href="{{ route('post.edit', $post->id) }}"
                                       class=" btn btn-outline btn-primary btn-xs">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                             stroke-width="1.5" stroke="currentColor" class="size-3">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10"/>
                                        </svg>
                                    </a>
                                @endcan
                                @can('delete', $post)

                                    @trash
                                    <form class=" inline-block"
                                          action="{{ route('post.destroy', [$post->id,'delete'=>'soft']) }}"
                                          method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class=" btn btn-outline btn-primary btn-xs">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                 viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                 class="size-3">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                      d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0"/>
                                            </svg>
                                        </button>
                                    </form>
                                @else

                                    <form class=" inline-block"
                                          action="{{ route('post.destroy', [$post->id,'delete'=>'force']) }}"
                                          method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class=" btn btn-outline btn-primary btn-xs">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                 fill="currentColor" class="size-3">
                                                <path fill-rule="evenodd"
                                                      d="M16.5 4.478v.227a48.816 48.816 0 0 1 3.878.512.75.75 0 1 1-.256 1.478l-.209-.035-1.005 13.07a3 3 0 0 1-2.991 2.77H8.084a3 3 0 0 1-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 0 1-.256-1.478A48.567 48.567 0 0 1 7.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 0 1 3.369 0c1.603.051 2.815 1.387 2.815 2.951Zm-6.136-1.452a51.196 51.196 0 0 1 3.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 0 0-6 0v-.113c0-.794.609-1.428 1.364-1.452Zm-.355 5.945a.75.75 0 1 0-1.5.058l.347 9a.75.75 0 1 0 1.499-.058l-.346-9Zm5.48.058a.75.75 0 1 0-1.498-.058l-.347 9a.75.75 0 0 0 1.5.058l.345-9Z"
                                                      clip-rule="evenodd"/>
                                            </svg>

                                        </button>
                                    </form>
                                    <form class=" inline-block"
                                          action="{{ route('post.destroy', [$post->id,'delete'=>'restore']) }}"
                                          method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class=" btn btn-outline btn-primary btn-xs">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                 stroke-width="1.5" stroke="currentColor" class="size-3">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                      d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99"/>
                                            </svg>

                                        </button>
                                    </form>

                                    @endtrash

                                @endcan
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <th colspan="6">
                                <h1 class=" text-center">No Content</h1>
                            </th>
                        </tr>
                    @endforelse
                    </tbody>
                </table>

                <div>
                    {{ $posts->onEachSide(1)->links('') }}
                </div>
            </div>
        </x-card>

    </div>
</x-app-layout>
