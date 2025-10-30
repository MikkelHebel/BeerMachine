<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <title>Beer Machine</title>
        @vite('resources/css/app.css')
        <link rel="icon" type="image/x-icon" href="{{ asset('nedenunder-favicon.ico') }}">

</head>
<header>
    <nav class="flex items-center justify-between px-6 py-7 bg-[#FFCF4B] w-screen">

        <a href="{{ route('home') }}">
            <img src="{{ asset('images/nedenunder-logo.png') }}" alt="Nedenunder Logo" class="h-8 w-auto">
        </a>

        <div class="flex space-x-18 text-base">
            <a href="{{ route('home') }}">Home</a>
            <a href="{{ route('production') }}">Production</a>
            <a href="{{ route('status') }}">Status</a>
            <a href="{{ route('statistics') }}">Statistics</a>
            <a href="{{ route('admin') }}">Admin</a>
        </div>

        <div class="flex space-x-5">
            <a href="{{ route('settings') }}">
                <img src="{{ asset('images/settings.png') }}" alt="Settings Icon" class="h-8 w-auto">
            </a>
            <h3 class="from-red-50">ABORT</h3>
        </div>

    </nav>
</header>

<body>
    <main>
        {{ $slot }}
    </main>
</body>

</html>
