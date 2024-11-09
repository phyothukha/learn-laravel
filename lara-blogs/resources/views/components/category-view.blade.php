@props(['post'])

<div class="card border p-2 my-3">
    <div class=" card-body">
        <h1>{{ $post->title }}</h1>
        <a href="{{route('page.category',$post->category->slug)}}" class=" badge badge-accent">
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
