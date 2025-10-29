<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utc-8">
        <title>Beer Machine</title>
        @vite('resources/css/app.css')

    </head>
    
    <body>
        <main class="container">
            {{ $slot }}
        </main>
    </body>

</html>
