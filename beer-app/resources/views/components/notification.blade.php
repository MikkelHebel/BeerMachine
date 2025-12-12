<div id="toast-container"></div>

@vite(['resources/css/notification-bar.css', 'resources/js/notification-bar.js'])

@if(session('notify'))
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            window.toast(@json(session('notify')));
        });
    </script>
@endif

{{--@if (session('refill'))
    <div id="refill" class="p-4 text-center bg-yellow-500 text-white-50 font-bold">
        {{ session('refill') }}
    </div>
@endif--}}