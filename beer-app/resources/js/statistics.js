import { chart } from "https://cdn.jsdelivr.net/npm/chart.js/dist/chart.umd.js";
// let x_axis = [25, 50, 75, 100, 125, 150];
// let y_axis = [10, 20, 35, 55, 80, 95];

let currentChart = null;

document.getElementById('failureBySpeed').addEventListener("click", () => {
    getBeerDataset();
    });

function line_graph(x, y) {
    const ctx = document.getElementById('myChart');

    if (currentChart) {
        currentChart.destroy();
        currentChart = null;
    }

    currentChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: x, // x values
            datasets: [{
            label: 'Experiment Results',
            data: y, // y values
            borderColor: 'blue',
            borderWidth: 2,
            fill: false,
            }]
        },
        options: {
            responsive: true,
            scales: {
            x: {
                title: {
                display: true,
                text: 'Speed (beers per minute)', // X-axis label
                font: {
                    size: 14,
                    weight: 'bold'
                }
                }
            },
            y: {
                title: {
                display: true,
                text: 'Failure Rate (%)', // Y-axis label
                font: {
                    size: 14,
                    weight: 'bold'
                }
                },
                min: 0,
                max: 100
            }
            }
        }
        });
}

function failedRatio(fails, completed) {
    const failRate = [];
    for (let index = 0; index < completed.length; index++) {
        failRate.push((fails[index] / completed[index])*100);
    }
    return failRate;
}

function getBeerDataset() {
    const selectedBeertype = document.querySelector('input[name="beerselection"]:checked');
    if (!selectedBeertype) {
        console.log("No beer type selected");
        return;
    }
    const selectedValue = parseInt(selectedBeertype.value.trim());

    let speed = [];
    let amount_completed = [];
    let failed = [];
    let failRate = [];

    switch (selectedValue) {
        case 1:
            setupVariables(window.batchOne)
            break;
        case 2:
            setupVariables(window.batchTwo)
            break;
        case 3:
            setupVariables(window.batchThree)
            break;
        case 4:
            setupVariables(window.batchFour)
            break;
        case 5:
            setupVariables(window.batchFive)
            break;
        case 6:
            setupVariables(window.batchSix)
            break;

        default:
            console.log("no beer type with that value.");
            break;
    }
    console.log(speed);
    console.log(failRate);
    console.log(selectedValue);
    line_graph(speed, failRate);

    function setupVariables(batch) {
        batch.sort((a, b) => a.speed - b.speed);
        speed = batch.map(batch => batch.speed);
        amount_completed = batch.map(batch => batch.amount_completed);
        failed = batch.map(batch => batch.failed);
        failRate = failedRatio(failed, amount_completed);
    }
}

