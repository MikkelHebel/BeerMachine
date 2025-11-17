<x-app>
    @vite('resources/css/statistics.css')
    <x-notification></x-notification>
    <x-navigation-bar></x-navigation-bar>

    <h2>Select a beer type to view data from:</h2>
        <form action="">
            <div class="beerTypeRadio">
                <div class="beerRadioOption">
                    <label>Pilsner</label>
                    <input id="pilsnerradio" type="radio" value="0">
                </div>
                <div class="beerRadioOption">
                    <label>Wheat</label>
                    <input id="wheatradio" type="radio" value="1">
                </div>
                <div class="beerRadioOption">
                    <label>IPA</label>
                    <input id="iparadio" type="radio" value="2">
                </div>
                <div class="beerRadioOption">
                    <label>Stout</label>
                    <input id="stoutradio" type="radio" value="3">
                </div>
                <div class="beerRadioOption">
                    <label>Ale</label>
                    <input id="aleradio" type="radio" value="4">
                </div>
                <div class="beerRadioOption" >
                    <label>Alcohol Free</label>
                    <input id="zeroalcoholradio" type="radio" value="5" onchange="line_graph(x_axis,y_axis)">
                </div>

            </div>
        </form>
        <div id="graphView">
            <canvas id="myChart"></canvas>
        </div>



</x-app>

