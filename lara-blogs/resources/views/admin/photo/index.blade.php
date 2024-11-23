<x-app-layout>

<x-bread-crumb :links="$links"/>

    <div class="max-w-7xl mx-auto my-3">
        <x-card id="12" class=" text-xl ">
            <x-slot:title>Photo Page</x-slot:title>
            <div class=" p-6 text-gray-900 columns-3" >

                @forelse(\Illuminate\Support\Facades\Auth::user()->photos as $photo)
                    <img src="{{$photo->name}}" class=" mb-3 w-full"  alt="">
                @empty
                    <h1>No Photo.</h1>
                @endforelse
            </div>
        </x-card>

</div>
</x-app-layout>
