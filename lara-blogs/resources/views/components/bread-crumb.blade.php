<div class="breadcrumbs text-sm">
    <ul>
        @foreach($links as $name=>$url)
            @if($loop->last)
        <li>{{$name}}</li>
            @else
        <li><a href="{{$url}}">{{$name}}</a></li>
            @endif
        @endforeach

    </ul>
</div>
