<!DOCTYPE html>
<html lang="en" data-theme="wireframe">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>

<body>

    @include('layout.header')

    @yield('content')
    {{-- <div class=" container mx-auto max-w-6xl"> --}}
    {{-- @yield('content') --}}
    {{-- </div> --}}




</body>

</html>
