import { chart } from "https://cdn.jsdelivr.net/npm/chart.js/dist/chart.umd.js";

let x_axis = [25, 50, 75, 100, 125, 150];
let y_axis = [10, 20, 35, 55, 80, 95];

document.getElementById('failureBySpeed').addEventListener("click", () => {
    line_graph(x_axis, y_axis);
    });

function line_graph(x, y) {
    const ctx = document.getElementById('myChart');

    new Chart(ctx, {
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

function getBeerDataset() {
    const selectedBeertype = document.querySelector('input[name="beerselection"]:checked');
    if (selectedBeertype) {
        const selectedValue = selectedBeertype.value;


    }
}

