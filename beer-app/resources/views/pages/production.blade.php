<x-app>
    @vite(['resources/css/production.css'])
    @vite(['resources/js/production.js'])

    <x-notification></x-notification>
    <x-navigation-bar />

    <div class="production">
        <form action="{{ route('send.command') }}" method="POST" class="production-form" id="production-form">
            @csrf

            <div class="form-top">

                <div class="beer-type">
                    <label>Beer Type</label>
                    <select class="input"> 
                        <option disabled selected hidden>Select beer type</option>
                        @foreach ($types as $type) <!-- Create type options based on types from db -->
                            <option value='{{$type->id}}'>{{$type->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="input-group">
                    <div>
                        <label>Speed</label>
                        <input class="input" placeholder="Set speed (beers per minute)...">
                    </div>

                    <div>
                        <label>Quantity</label>
                        <input class="input" placeholder="Amount...">
                    </div>
                </div>

                <input value="{{ auth()->user()->id }}" id="user" hidden>
                
            </div>

            <div class="buttons">
                <button id="btnCalibrate" class="button btnCalibrate">Calibrate</button>

                <button id="btnClear" class="button btnClear">Clear</button>

                <button id="btnSubmit" class="button btnSubmit">Add to queue</button>
            </div>

            <div class="batch-card">
                <h2>Ongoing Batch</h2>
                <div class="progress-container">
                    <div class="progress-bar" style="width: 40%">Batch Progress Bar</div>
                </div>
            </div>
        </form>
        
        <form action="{{ route('send.command') }}" method="POST">
            @csrf
            <input type="hidden" name="type" value="start">
            <button type="submit">Start production</button>
        </form>

        <form action="{{ route('send.command') }}" method="POST">
            @csrf
            <input type="hidden" name="type" value="stop">
            <button type="submit">Stop</button>
        </form>

        <form action="{{ route('send.command') }}" method="POST">
            @csrf
            <input type="hidden" name="type" value="reset">
            <button type="submit">Reset</button>
        </form>

    </div>
</x-app>