<div id="toast-container"></div>

@vite(['resources/css/notification-bar.css', 'resources/js/notification-bar.js'])

@if(session('notify'))
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            window.toast(@json(session('notify')));
        });
    </script>
@endif
