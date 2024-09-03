<!DOCTYPE html>
<html data-theme="light" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Sample Blogs')</title>
    @vite('resources/css/app.css')
</head>

<body>
    @yield('content')

</body>

</html>
