@vite('resources/css/navigation-bar.css')

<nav class="navbar">
    <a href="{{ route('home') }}" class="navbar-logo">
        <img src="{{ asset('images/nedenunder-logo.png') }}" alt="Nedenunder Logo">
    </a>

    <div class="navbar-links">
        <a href="{{ route('home') }}" class="navbar-text {{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
        <a href="{{ route('production') }}" class="navbar-text {{ request()->routeIs('production') ? 'active' : '' }}">Production</a>
        <a href="{{ route('status') }}" class="navbar-text {{ request()->routeIs('status') ? 'active' : '' }}">Status</a>
        <a href="{{ route('statistics') }}" class="navbar-text {{ request()->routeIs('statistics') ? 'active' : '' }}">Statistics</a>
        <a href="{{ route('admin') }}" class="navbar-text {{ request()->routeIs('admin') ? 'active' : '' }}">Admin</a>
    </div>

    <div class="navbar-right">
        <a href="{{ route('settings') }}">
            <img src="{{ asset('images/settings.png') }}" alt="Settings Icon" class="settings-icon">
        </a>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn">Logout</button>
        </form>
        <h3 class="abort-btn">ABORT</h3>
    </div>
</nav>
