<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css')
    {{--        <link rel="stylesheet" href="/app.css">--}}
    <title>My First Laravel Blog!</title>
    @vite('resources/js/app.js')
</head>
<body class="antialiased">
<main>
    {{$slot}}
    <a href="/">Home</a>
</main>
</body>
</html>
