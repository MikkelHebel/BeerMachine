<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utc-8">
        <title>@yield('title', 'Beer Machine')</title>

    </head>
    
    <body>
        <main>
            {{ $slot }}
        </main>
    </body>

</html>
