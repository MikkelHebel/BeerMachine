import { chart } from "https://cdn.jsdelivr.net/npm/chart.js/dist/chart.umd.js";
// let x_axis = [25, 50, 75, 100, 125, 150];
// let y_axis = [10, 20, 35, 55, 80, 95];

document.getElementById('failureBySpeed').addEventListener("click", () => {
    getBeerDataset();
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

function failedratio(fails, completed) {
    const failrate = [];
    for (let index = 0; index < completed.length; index++) {
        failrate.push((fails[index] / completed[index])*100);
    }
    return failrate;
}

function getBeerDataset() {
    const selectedBeertype = document.querySelector('input[name="beerselection"]:checked');
    if (!selectedBeertype) {
        console.log("No beer type selected");
        return;
    }
    const selectedValue = selectedBeertype.value.trim();

    const speed = [];
    const amount_completed = [];
    const failed = [];
    const failrate = [];

    switch (selectedValue) {
        case 1:
            speed = window.Batchone.map(Batchone => Batchone.speed);
            amount_completed = window.Batchone.map(Batchone => Batchone.amount_completed);
            failed = window.Batchone.map(Batchone => Batchone.failed);
            failrate = failedratio(failed, amount_completed);
            break;
        case 2:
            speed = window.Batchtwo.map(Batchtwo => Batchtwo.speed);
            amount_completed = window.Batchtwo.map(Batchtwo => Batchtwo.amount_completed);
            failed = window.Batchtwo.map(Batchtwo => Batchtwo.failed);
            failrate = failedratio(failed, amount_completed);
            break;
        case 3:
            speed = window.Batchthree.map(Batchthree => Batchthree.speed);
            amount_completed = window.Batchthree.map(Batchthree => Batchthree.amount_completed);
            failed = window.Batchthree.map(Batchthree => Batchthree.failed);
            failrate = failedratio(failed, amount_completed);
            break;
        case 4:
            speed = window.Batchfour.map(Batchfour => Batchfour.speed);
            amount_completed = window.Batchfour.map(Batchfour => Batchfour.amount_completed);
            failed = window.Batchfour.map(Batchfour => Batchfour.failed);
            failrate = failedratio(failed, amount_completed);
            break;
        case 5:
            speed = window.Batchfive.map(Batchfive => Batchfive.speed);
            amount_completed = window.Batchfive.map(Batchfive => Batchfive.amount_completed);
            failed = window.Batchfive.map(Batchfive => Batchfive.failed);
            failrate = failedratio(failed, amount_completed);
            break;
        case 6:
            speed = window.Batchsix.map(Batchsix => Batchsix.speed);
            amount_completed = window.Batchfive.map(Batchsix => Batchsix.amount_completed);
            failed = window.Batchsix.map(Batchsix => Batchsix.failed);
            failrate = failedratio(failed, amount_completed);
            break;

        default:
            console.log("no beer type with that value.");
            break;
    }
    console.log(speed);
    console.log(failrate);
    console.log(selectedValue);
    line_graph(speed, failrate);

}

