<x-app>
    @vite(['resources/css/home.css'])
    @vite(['resources/js/homepage.js'])
    <x-notification></x-notification>
    <x-navigation-bar></x-navigation-bar>
    <div>
        <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ"
            target="_blank" rel="external nofollow">
            Safe link
        </a>
    </div>

    <div class="contents">
        <div class="card">
            <h2>
                Batch ID <div class="batch-id" id="batch-id">base</div>
            </h2>
            <div class="beer-icon"></div>
            <p>Type</p>

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
            <div class="queue-item">Batch: base</div>
            <div class="queue-item">Batch: base</div>
            <div class="queue-item">Batch: base</div>
        </div>
    </div>
</x-app>