<x-app>
    @vite(['ressources/css/status.css'])
    <x-notification></x-notification>
    <x-navigation-bar></x-navigation-bar>
    <div class="machine-status">
        <div class="upper-div">
            <div id="temperature-div">
                <h2>Temperature:</h2>
                <h2 id="temperature-h2"></h2>
            </div>
            <div id="vibration-div">
                <h2>Vibration:</h2>
                <h2 id="vibration-h2"></h2>
            </div>
            <div id="humidity-div">
                <h2>Humidity:</h2>
                <h2 id="humidity-h2"></h2>
            </div>
        </div>
        <div class="lower-div">
            <div id="total-brewed-div">
                <h2>Total brewed:</h2>
                <h2 id="total-brewed-h2"></h2>
            </div>

            <div id="total-failed-div">
                <h2>Total failed:</h2>
                <h2 id="total-failed-id"></h2>
            </div>
            
            <div id="ratio-div">
                <h2>Ratio:</h2>
                <h2 id="ratio-id"></h2>
            </div>
        </div>
    </div>

    <div class="inventory-div">
    <div id="barley" data-label="Barley">
        <div id="bar"></div>
    </div>
    <div id="hops" data-label="Hops">
        <div id="bar"></div>
    </div>
    <div id="malt" data-label="Malt">
        <div id="bar"></div>
    </div>
    <div id="wheat" data-label="Wheat">
        <div id="bar"></div>
    </div>
    <div id="yeast" data-label="Yeast">
        <div id="bar"></div>
    </div>
</div>
</x-app>