@if (session('notify'))
    <div id="notify" class="p-4 text-center bg-red-500 text-white-50 font-bold">
        {{ session('notify') }}
    </div>
@endif
