@extends("master")
@section("content")
    <div class=" container max-w-4xl mx-auto">
        <div>
            <h1 class=" my-5 text-xl font-bold text-center">Blog Posts</h1>

            @forelse($posts as $post)

            <div class="card border p-2 my-3">
                <div class=" card-body">

                    <h1>{{ $post->title }}</h1>
                    <a href="#" class=" badge badge-accent">
                        {{$post->category->title}}
                    </a>
                    <p>{{$post->excerpt}}</p>
                </div>
                <div class=" card-actions">

                    <div class=" ms-8">
                    <p>{{$post->user->name}}</p>
                    <p>{{$post->created_at->diffForHumans()}}</p>
                    </div>
                <a
                    href="{{route("page.detail",$post->id)}}"
                    class=" btn btn-primary ms-auto">See More</a>
                </div>
            </div>

            @empty
                <div class=" card ">
                    <div class=" card-body">
                        There are no results in data
                    </div>

                </div>
            @endforelse


        </div>
        <div>

            <div>
                {{ $posts->onEachSide(1)->links('') }}
            </div>

        </div>

    </div>



@endsection
