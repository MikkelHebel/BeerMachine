<x-app>
    <script>
        window.beerTypes = @json($types);
        window.batchOne = @json($batchOne);
        window.batchTwo = @json($batchTwo);
        window.batchThree = @json($batchThree);
        window.batchFour = @json($batchFour);
        window.batchFive = @json($batchFive);
        window.batchSix = @json($batchSix);
    </script>

    @vite(['resources/css/statistics.css', 'resources/js/statistics.js'])
    <x-notification></x-notification>
    <x-navigation-bar></x-navigation-bar>

    <div class="statpage">
        <div class="leftside">

            <h2>Select a beer type to view data from:</h2>

            <form>
                @csrf
                <div class="beerTypeRadio">
                    @foreach ($types as $type)
                    <div class="beerRadioOption">
                        <label>{{ $type -> name }}</label>
                        <input id="pilsnerradio" name="beerselection" type="radio" value="{{ $type -> id }}">
                    </div>
                    @endforeach
                </div>
            </form>

            <div class="DataPlotsContainer">
                <h3>Data Plots</h3>
                <div class="DataPlots">
                    <button id="failureBySpeed" class="DataPlotsbuttons" type="button">Failure by speed</button>
                    <button class="DataPlotsbuttons" type="button" onclick="">Ingredients</button>
                </div>
            </div>
        </div>

        <div class="rightside">
            <div id="graphView">
                <h3 class="graphTitle">Graph View</h3>
                <div class="graphBox">
                    <canvas id="myChart"></canvas>
                </div>
            </div>
        </div>
    </div>

</x-app>