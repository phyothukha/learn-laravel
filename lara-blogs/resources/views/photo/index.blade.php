<x-app-layout>

<div class=" breadcrumbs text-sm">

    <ul>
        <li><a href="#">Home</a></li>
        <li> Photos</li>
    </ul>

    <div class="max-w-7xl mx-auto my-3">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 ">
                {{ __("Photo Page") }}
            </div>

            <div class=" p-6 text-gray-900 columns-3" >
                @forelse(\Illuminate\Support\Facades\Auth::user()->photos as $photo)
                    <img src="{{$photo->name}}" class=" mb-3 w-full"  alt="">
                @empty
                    <h1>No Photo.</h1>
                @endforelse
            </div>
        </div>
    </div>
</div>
</x-app-layout>
