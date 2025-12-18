<x-app>
    <script>
        window.beerTypes = @json($types);
    </script>

    @vite(['resources/css/home.css'])
    @vite(['resources/js/updateBatchStatus.js', 'resources/js/updateQueueStatus.js'])

    <x-notification></x-notification>
    <x-navigation-bar></x-navigation-bar>

    <div class="contents">
        <div class="card">
            <h2>
                Batch ID <div class="batch-id" id="batch-id">N/D</div>
            </h2>
            <div class="beer-icon"></div>
            <span>
                <p>Type</p>
                <p id="beerType"></p>
            </span>


            <div class="label">Batch size</div>
            <div class="value-box" id="batch-size"></div>

            <div class="label">Brewed</div>
            <div class="value-box" id="amount-complete"></div>

            <div class="label">Failed</div>
            <div class="value-box" id="amount-failed"></div>

            <div class="label">Ratio</div>
            <div class="value-box" id="ratio"></div>
        </div>

        <div class="queue">
            <h3>Queue</h3>
            <div name="queue" id="queue">
            </div>
        </div>

    </div>
</x-app>