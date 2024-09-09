@extends('layout.app')

@section('content')
    {{-- <h1>Hello index</h1> --}}


    <div class="overflow-x-auto">
        <table class="table">
            <!-- head -->
            @if (session('status'))
                <div role="alert" class="alert alert-success">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>{{ session('status') }}</span>
                </div>
            @endif
            <thead>
                <tr>
                    <th>
                        <label>
                            <input type="checkbox" class="checkbox" />
                        </label>
                    </th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- row 1 -->
                @foreach ($posts as $post)
                    <tr>
                        <th>
                            <label>
                                <input type="checkbox" class="checkbox" />
                            </label>
                        </th>
                        <td>
                            <div class="flex items-center gap-3">
                                <div>
                                    <div class="font-bold">{{ $post->title }}</div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div>{{ $post->description }}</div>
                        </td>
                        <td>
                            <div>
                                {{ $post->created_at }}
                            </div>
                        </td>
                        <th class="">
                            <form method="POST" class=" inline-block" action="{{ route('post.destroy', $post) }}">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-outline btn-xs btn-error">
                                    Delete
                                </button>
                            </form>
                            <a href="{{ route('post.edit', $post->id) }}" class="btn btn-outline btn-info btn-xs">Edit</a>
                            <a href="{{ route('post.show', $post->id) }}" class="btn btn-ghost btn-xs">details</a>
                        </th>
                    </tr>
                @endforeach


            </tbody>

        </table>
    </div>
@endsection
