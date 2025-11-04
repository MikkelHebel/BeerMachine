<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <title>Beer Machine</title>
        @vite('resources/css/app.css')
        <link rel="icon" type="image/x-icon" href="{{ asset('nedenunder-favicon.ico') }}">

</head>

<body>
    @if (session('notify'))
        <div id="notify" class="p-4 text-center bg-red-50 text-white-50 font-bold">
            {{ session('notify') }}
        </div>
    @endif

    <main>
        {{ $slot }}
    </main>
</body>

</html>
