<x-app>
    @vite('resources/css/statistics.css')
    <x-notification></x-notification>
    <x-navigation-bar></x-navigation-bar>

    <div class="statpage">
        <div class="leftside">

            <h2>Select a beer type to view data from:</h2>

            <form action="">
                <div class="beerTypeRadio">
                    <div class="beerRadioOption">
                        <label>Pilsner</label>
                        <input id="pilsnerradio" name="beerselection" type="radio" value="0">
                    </div>
                    <div class="beerRadioOption">
                        <label>Wheat</label>
                        <input id="wheatradio" name="beerselection" type="radio" value="1">
                    </div>
                    <div class="beerRadioOption">
                        <label>IPA</label>
                        <input id="iparadio" name="beerselection" type="radio" value="2">
                    </div>
                    <div class="beerRadioOption">
                        <label>Stout</label>
                        <input id="stoutradio" name="beerselection" type="radio" value="3">
                    </div>
                    <div class="beerRadioOption">
                        <label>Ale</label>
                        <input id="aleradio" name="beerselection" type="radio" value="4">
                    </div>
                    <div class="beerRadioOption" >
                        <label>Alcohol Free</label>
                        <input id="zeroalcoholradio" name="beerselection" type="radio" value="5" onchange="line_graph(x_axis,y_axis)">
                    </div>
                </div>
            </form>

            <div class="DataPlotsContainer">
                <h3>Data Plots</h3>
                <div class="DataPlots">
                    <button class="DataPlotsbuttons" type="button" onclick="">Failure by speed</button>
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

