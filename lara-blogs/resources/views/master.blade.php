<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>


    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack("style")
</head>
<body>


@yield("content")


</body>
</html>
