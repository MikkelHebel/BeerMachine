<x-app>
    @vite(['resources/css/home.css'])
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
                Batch ID <span class="batch-id">base</span>
            </h2>
            <div class="beer-icon"></div>
            <p>Type</p>

            <div class="label">Batch size</div>
            <div class="value-box"></div>

            <div class="label">Brewed</div>
            <div class="value-box"></div>

            <div class="label">Failed</div>
            <div class="value-box"></div>

            <div class="label">Ratio</div>
            <div class="value-box"></div>
        </div>

        <div class="queue">
            <h3>Queue</h3>
            <div class="queue-item">Batch: base</div>
            <div class="queue-item">Batch: base</div>
            <div class="queue-item">Batch: base</div>
        </div>
    </div>
</x-app>
