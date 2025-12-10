<x-app>
    @vite(['resources/css/production.css'])
    @vite(['resources/js/production.js'])
    @vite(['resources/js/calibration.js'])

    <x-notification></x-notification>
    <x-navigation-bar />

    <script>
        window.beerTypes = @json($types);
    </script>

    <div class="production">
        <div class="production-layout">
            
            <div class="production-left">
                <form action="{{ route('send.command') }}" method="POST" class="production-form" id="production-form">
                    @csrf

                    <div class="form-top">
                        <div class="beer-type">
                            <label>Beer Type</label>
                            <select class="input"> 
                                <option disabled selected hidden>Select beer type</option>
                                @foreach ($types as $type)
                                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="input-group">
                            <div>
                                <label>Speed</label>
                                <input class="input" placeholder="Set speed (beers per minute)...">

                                <p id="hintMax" class="speed-hint">*Max speed is 0.</p>
                                <p id="hintRec" class="speed-hint">*Recommended speed is 0.</p>
                            </div>

                            <div>
                                <label>Quantity</label>
                                <input class="input" placeholder="Amount...">
                            </div>
                        </div>

                        <input value="{{ auth()->user()->id }}" id="user" hidden>
                    </div>

                    <div class="buttons-left">
                        <input type="hidden" name="type" value="batch">
                        <input type="hidden" name="parameters[amount]" id="paramAmount">
                        <input type="hidden" name="parameters[speed]" id="paramSpeed">
                        <input type="hidden" name="parameters[type]" id="paramType">
                        <input type="hidden" name="parameters[user]" id="paramUser">
                        
                        <button id="btnClear" class="button btnClear">Clear</button>
                        <button id="btnQueue" class="button btnQueue">Add to queue</button>
                    </div>

                    <div class="batch-card">
                        <h2>Ongoing Batch</h2>
                        <div class="progress-container">
                            <div class="progress-bar">Batch Progress Bar</div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="production-right">

                <form action="{{ route('send.command') }}" method="POST">
                    @csrf
                    <input type="hidden" name="type" value="start">
                    <button id="btnStart" type="submit" class="button btnStart full-btn">Start</button>
                </form>

                <form action="{{ route('send.command') }}" method="POST">
                    @csrf
                    <input type="hidden" name="type" value="stop">
                    <button type="submit" class="button btnStop full-btn">Stop</button>
                </form>

                <form action="{{ route('send.command') }}" method="POST">
                    @csrf
                    <input type="hidden" name="type" value="reset">
                    <button type="submit" class="button btnReset full-btn">Reset</button>
                </form>

            </div>

        </div>
    </div>
</x-app>
