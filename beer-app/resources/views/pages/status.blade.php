<x-app>
    @vite([
    'resources/css/status.css',
    'resources/js/updateInventoryAmount.js',
    'resources/js/updateMachineStatus.js',
    'resources/js/updateBrewTotal.js'
    ])
    <x-notification></x-notification>
    <x-navigation-bar></x-navigation-bar>
    <div class="container">
        <div class="machine-status">
            <div class="upper-div">
                <div id="temperature-div">
                    <h2>Temperature:</h2>
                    <h2 id="temperature-h2">--</h2>
                </div>
                <div id="vibration-div">
                    <h2>Vibration:</h2>
                    <h2 id="vibration-h2">--</h2>
                </div>
                <div id="humidity-div">
                    <h2>Humidity:</h2>
                    <h2 id="humidity-h2">--</h2>
                </div>
            </div>
            <div class="lower-div">
                <div id="total-brewed-div">
                    <h2>Total brewed:</h2>
                    <h2 id="total-brewed-h2">--</h2>
                </div>

                <div id="total-failed-div">
                    <h2>Total failed:</h2>
                    <h2 id="total-failed-id">--</h2>
                </div>

                <div id="ratio-div">
                    <h2>Ratio:</h2>
                    <h2 id="ratio-id">--</h2>
                </div>
            </div>
        </div>

        <div class="inventory-div">
            <div id="barley-container">
                <h2>Barley</h2>
                <p id="barley-amount" class="inventory-amount">0%</p>
                <div id="barley" class="inventory-bar">
                    <div id="bar"></div>
                </div>
            </div>

            <div id="hops-container">
                <h2>Hops</h2>
                <p id="hops-amount" class="inventory-amount">0%</p>
                <div id="hops" class="inventory-bar">
                    <div id="bar"></div>
                </div>
            </div>

            <div id="malt-container">
                <h2>Malt</h2>
                <p id="malt-amount" class="inventory-amount">0%</p>
                <div id="malt" class="inventory-bar">
                    <div id="bar"></div>
                </div>
            </div>

            <div id="wheat-container">
                <h2>Wheat</h2>
                <p id="wheat-amount" class="inventory-amount">0%</p>
                <div id="wheat" class="inventory-bar">
                    <div id="bar"></div>
                </div>
            </div>

            <div id="yeast-container">
                <h2>Yeast</h2>
                <p id="yeast-amount" class="inventory-amount">0%</p>
                <div id="yeast" class="inventory-bar">
                    <div id="bar"></div>
                </div>
            </div>
        </div>
    </div>

</x-app>