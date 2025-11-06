<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <title>Beer Machine</title>
    @vite('resources/css/app.css')
    <link rel="icon" type="image/x-icon" href="{{ asset('nedenunder-favicon.ico') }}">
</head>
<body>
    <main>
        {{ $slot }}
    </main>
</body>

</html>
