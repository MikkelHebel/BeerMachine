<!DOCTYPE html>
<html>
<head>
    <meta charset="utc-8">
    <title>@yield('title', 'Beer Machine')</title>
</head>
<body>
    <header class="nav">
        <a href="{{ route('home') }}">Home</a>
        <a href="{{ route('production') }}">Production</a>
        <a href="{{ route('status') }}">Status</a>
        <a href="{{ route('statistics') }}">Statistics</a>
        <a href="{{ route('admin') }}">Admin</a>
        <a href="{{ route('settings') }}">Settings</a>
    </header>

    <main>
        @yield('content')
    </main>
</body>
</html>
