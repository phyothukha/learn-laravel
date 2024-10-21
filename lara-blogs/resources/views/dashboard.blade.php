<x-app-layout>


    <div class="breadcrumbs text-sm">
        <ul>
            <li><a>Home</a></li>
            <li>Dashboard</li>
        </ul>
    </div>
    <div class="max-w-7xl mx-auto my-3">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                {{ __("You're logged in!") }}
                <br>
                {{ Auth::user() }}
            </div>
        </div>
    </div>

</x-app-layout>
