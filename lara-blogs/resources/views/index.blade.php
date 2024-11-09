@extends("master")
@section("content")
    <div class=" container max-w-4xl mx-auto">
        <div>

            <h1 class=" my-5 text-xl font-bold text-center">Blog Posts</h1>



{{--            @dd(request('keyword'))keyword--}}
            <form action="{{route("page.index")}}" method="get" >
            <div class=" w-full text-end inline-block join">
                <input  type="text" placeholder="Search..." name="keyword" class=" input input-accent" value="{{request('keyword')}}"/>
                <button class=" btn btn-primary" type="submit">Search</button>
            </div>
            </form>

            <a href="{{route('page.index')}}" class=" btn btn-outline btn-secondary" >See All</a>
{{--            @forelse($posts as $post)--}}
{{--                <x-category-view :post="$post"/>--}}


{{--            @empty--}}
{{--                <div class=" card ">--}}
{{--                    <div class=" card-body">--}}
{{--                        There are no results in data--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            @endforelse--}}

            <x-post-view />
        </div>
        <div>

            <div>
                {{ $posts->onEachSide(1)->links('') }}
            </div>

        </div>

    </div>



@endsection
