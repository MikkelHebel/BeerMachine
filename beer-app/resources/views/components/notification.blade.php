@if ( session('notify') )
    <div id="notify" class="p-4 text-center bg-red-500 text-white-50 font-bold">
        {{ session('notify') }}
    </div>
@endif

@if (session('refill'))
    <div id="refill" class="p-4 text-center bg-yellow-500 text-white-50 font-bold">
        {{ session('refill') }}
    </div>
@endif