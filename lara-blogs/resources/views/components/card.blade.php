<div {{$attributes->merge(['class'=> ' bg-white overflow-hidden shadow-sm sm:rounded-lg'])}}>
    <div class="p-6 text-gray-900 ">
        <h1 class=" text-xl font-bold">{{$title??"San Kyi Nay Tar Par"}}</h1>
    <div class="divider"></div>
        {{$slot}}
    </div>

</div>
