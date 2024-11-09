<x-app-layout>

    <div class="breadcrumbs text-sm">
        <ul>
            <li><a>Home</a></li>
            <li>User</li>
        </ul>
    </div>
    <div class="max-w-7xl mx-auto my-3">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg ">
            <div class="p-6 text-gray-900">
                <h1 class=" text-xl font-bold">User Lists</h1>
                <div class="divider"></div>
                <div class=" flex justify-between items-center my-3">
                    <div class=" flex items-center gap-2">
                        @if (request('keyword'))
                            <h4>Search By : {{ request('keyword') }}</h4>
                            <a href="{{ route('post.index') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor"
                                    class="size-4">
                                    <path
                                        d="M5.28 4.22a.75.75 0 0 0-1.06 1.06L6.94 8l-2.72 2.72a.75.75 0 1 0 1.06 1.06L8 9.06l2.72 2.72a.75.75 0 1 0 1.06-1.06L9.06 8l2.72-2.72a.75.75 0 0 0-1.06-1.06L8 6.94 5.28 4.22Z" />
                                </svg>
                            </a>
                        @endif

                    </div>
                    <form class="join" action="{{ route('post.index') }}" method="get">
                        <input value="{{ request('keyword') }}" class="input input-bordered join-item" name="keyword"
                            required placeholder="Search here " />
                        <button class="btn join-item rounded-md" type="submit">Subscribe</button>
                    </form>
                </div>
                <div class="overflow-x-auto">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th class=" w-56">Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                                <tr>
                                    <th>{{ $user->id }}</th>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td></td>

                                    <td class=" w-40">
                                        <p class=" flex items-center gap-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="size-4">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                                            </svg>
                                            {{ $user->created_at->format('d M, Y') }}
                                        </p>
                                        <p class=" flex items-center gap-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="size-4">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                            </svg>
                                            {{ $user->created_at->format('h : m A') }}
                                        </p>
                                    </td>
                                    <td class=" w-36">
                                        <a href="{{ route('post.show', $user->id) }}"
                                            class=" btn btn-outline  btn-primary btn-xs">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="size-3">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                            </svg>

                                        </a>

                                        @can('update', $user)
                                            <a href="{{ route('post.edit', $user->id) }}"
                                                class=" btn btn-outline btn-primary btn-xs">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor" class="size-3">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                                </svg>
                                            </a>
                                        @endcan
                                        @can('delete', $user)
                                            <form class=" inline-block" action="{{ route('post.destroy', $user->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('delete')
                                                <button class=" btn btn-outline btn-primary btn-xs">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="size-3">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                    </svg>
                                                </button>
                                            </form>
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
                        {{ $users->onEachSide(1)->links('') }}
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>
