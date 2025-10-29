<nav class="flex items-center justify-between px-6 py-7 bg-[#FFCF4B]">

    <a href="{{ route('home') }}">
        <img src="{{ asset('images/nedenunder-logo.png') }}" alt="Nedenunder Logo" class="h-8 w-auto">
    </a>

    <div class="flex space-x-6">
        <a href="{{ route('home') }}">Home</a>
        <a href="{{ route('production') }}">Production</a>
        <a href="{{ route('status') }}">Status</a> 
        <a href="{{ route('statistics') }}">Statistics</a>
        <a href="{{ route('admin') }}">Admin</a>
        <a href="{{ route('settings') }}">Settings</a>
    </div>
</nav>
