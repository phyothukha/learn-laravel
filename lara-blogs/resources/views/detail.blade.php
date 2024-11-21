@extends("master")
@section("content")
    <div class=" container max-w-4xl mx-auto">
        <div>
            <h1 class=" my-5 text-xl font-bold text-center">Detail Post</h1>
                <div class="card border p-2 my-3">
                    <div class=" card-body">
                        <h1>{{ $post->title }}</h1>
                        <a href="#" class=" badge badge-accent">
                            {{$post->category->title}}
                        </a>



                        <div class=" ">
                        @foreach($post->photos as $photo)
                        <img src="{{$photo->name}}" alt=""   class=" inline-block mx-auto object-contain h-52" >
                        @endforeach
                        </div>
                        <p >{{$post->description}}</p>
                    </div>
                    <div class=" card-actions">
                        <div class=" ms-8">
                            <p>{{$post->user->name}}</p>
                            <p>{{$post->created_at->diffForHumans()}}</p>
                        </div>
                        <a
                            href="{{route("page.index")}}"
                            class=" btn btn-primary ms-auto">All Post</a>
                    </div>
                </div>




        </div>
        <div>



            <div class=" border p-5 rounded-lg">

            <h1 class=" text-xl font-bold">Recent Posts</h1>
{{--                @dd($recentPost)--}}

                @foreach($recentPost as $post)
{{--                   <h1> {{$post->title}}</h1>--}}

                    <x-category-view :post="$post"/>
                @endforeach
            </div>



        </div>

    </div>
@endsection



