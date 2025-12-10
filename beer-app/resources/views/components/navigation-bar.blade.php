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

        <p>Logged in as {{ auth()->user()->name }}</p>

            <div class="dropdown-wrapper">
                <img src="{{ asset('images/settings.png') }}" alt="Settings Icon" class="settings-icon" id="settingsToggle">

                <div class="dropdown-menu" id="settingsMenu">
                    <a href="{{ route('settings') }}" class="dropdown-item">Settings</a>

                    <form action="{{ route('logout') }}" method="POST" class="dropdown-item-form">
                        @csrf
                        <button type="submit" class="dropdown-item-btn">Logout</button>
                    </form>
                </div>
            </div>

        <form action="{{ route('send.command') }}" method="POST">
            @csrf
            <input type="hidden" name="type" value="abort">
            <button type="submit" class="abort-btn">ABORT</button>
        </form>
    </div>  
</nav>
<script>
        document.addEventListener("DOMContentLoaded", () => {
            const settingsToggle = document.getElementById("settingsToggle");
            const settingsMenu = document.getElementById("settingsMenu");

            settingsToggle.addEventListener("click", () => {
                settingsMenu.style.display = settingsMenu.style.display === "block" ? "none" : "block";
            });

            // Close dropdown when clicking outside
            document.addEventListener("click", (e) => {
                if (!settingsToggle.contains(e.target) && !settingsMenu.contains(e.target)) {
                    settingsMenu.style.display = "none";
                }
            });
        });

    </script>