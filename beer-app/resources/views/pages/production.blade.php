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
                        <option>Pilsner</option>
                        <option>Wheat</option>
                        <option>IPA</option>
                        <option>Stout</option>
                        <option>Ale</option>
                        <option>Alcohol Free</option>
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
            </div>

            <div class="buttons">
                <button id="btnCalibrate" class="button btnCalibrate">Calibrate</button>
                <button id="btnClear" class="button btnClear">Clear</button>
                <button id="btnSubmit" class="button btnSubmit">Start</button>
            </div>

            <div class="batch-card">
                <h2>Ongoing Batch</h2>
                <div class="progress-container">
                    <div class="progress-bar" style="width: 40%">Batch Progress Bar</div>
                </div>
            </div>
        </form>
    </div>
</x-app>
