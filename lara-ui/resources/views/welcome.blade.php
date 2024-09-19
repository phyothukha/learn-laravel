<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Testing Laravel</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>
    <div class="drawer">
        <input id="my-drawer-3" type="checkbox" class="drawer-toggle" />
        <div class="drawer-content flex flex-col">
            <!-- Navbar -->
            <div class="navbar bg-base-300 w-full">
                <div class="flex-none lg:hidden">
                    <label for="my-drawer-3" aria-label="open sidebar" class="btn btn-square btn-ghost">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            class="inline-block h-6 w-6 stroke-current">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </label>
                </div>
                <div class="mx-2 flex-1 px-2">Navbar Title</div>
                <div class="hidden flex-none lg:block">
                    <ul class="menu menu-horizontal">
                        <!-- Navbar menu content here -->
                        <li><a>Navbar Item 1</a></li>
                        <li><a>Navbar Item 2</a></li>
                    </ul>
                </div>
            </div>
            <!-- Page content here -->
            Content
        </div>
        <div class="drawer-side">
            <label for="my-drawer-3" aria-label="close sidebar" class="drawer-overlay"></label>
            <ul class="menu bg-base-200 min-h-full w-80 p-4">
                <!-- Sidebar content here -->
                <li><a>Sidebar Item 1</a></li>
                <li><a>Sidebar Item 2</a></li>
            </ul>
        </div>
    </div>
    <div class=" container">
        <h1>Hello world</h1>
    </div>
    <div>
        <div class=" bg-white rounded-md  m-5 p-5">
            <h1 class=" text-xl text-yellow-300">Hi Nay Kaung lar</h1>
            <div class=" display-1">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6 ">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
                </svg>
            </div>
            <div class=" display-3">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-4 ">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
                </svg>
            </div>
        </div>
        <div class=" rounded-md m-5 border-collapse bg-gray-200 p-5 animate__animated animate__fadeInDown">
            <h1 class=" text-red-500">Hello world</h1>
            <p class=" text-base-200 font-natoSans">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ex optio
                aliquam ipsum
                praesentium nobis
                reiciendis quas quae eveniet eius, vero adipisci ratione. Quisquam, at sequi a voluptate cumque tempora
                neque!</p>

            <h1 class=" text-red-500 font-paduk">မြန်မာ လို ရေး မလို့ ပါ
            </h1>
            <p class=" text-base-200 font-medium text-xl mb-5 font-paduk">မြန်မာလိုရေးချင်တာ ရေး မလို့ ပါ
                အဆင်ပြေရင်တစ်ခုခုပြန်
                ပြောခဲ့ ပါ ဥိး
            </p>
            <button id="modalControl" class=" btn btn-primary">Click me</button>

            <dialog id="my_modal_1" class="modal">
                <div class="modal-box">
                    <h3 class="text-lg font-bold">Hello!</h3>
                    <p class="py-4">Press ESC key or click the button below to close</p>
                    <div class="modal-action">
                        <form method="dialog">
                            <!-- if there is a button in form, it will close the modal -->
                            <button class="btn">Close</button>
                        </form>
                    </div>
                </div>
            </dialog>
        </div>
        <div class=" bg-white  p-5 m-5 rounded-md">

            <button id="confirmBtn" class=" btn btn-secondary">Confirm</button>

        </div>
    </div>


</body>

</html>
