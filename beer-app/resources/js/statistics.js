import { Chart } from 'chart.js/auto';

const xValues = [];
const yValues = [];

let currentChart = null;

document.getElementById("failureBySpeed").addEventListener("click", () => {
    getBeerDataset();
    });

document.getElementById("minmaxcmp").addEventListener("click", () => {
    linear_cmp();
    });

document.getElementById("InputPrediction").addEventListener("input", LinearRegression);

function line_graph(x, y) {
    const ctx = document.getElementById('myChart');

    //update graph if new dataset chosen.
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

    //gives dataset based on checked radiobutton.
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
    line_graph(speed, failRate);

    function setupVariables(batch) {
        batch.sort((a, b) => a.speed - b.speed);
        speed = batch.map(batch => batch.speed);
        amount_completed = batch.map(batch => batch.amount_completed);
        failed = batch.map(batch => batch.failed);
        failRate = failedRatio(failed, amount_completed);
    }
}

function sumOfArray(array) {
    let sum = 0;
    for (let i = 0; i < array.length; i++) {
        sum += array[i];
    }
    return sum;
}

function sumOfxy(x, y) {
    let sum = 0;
    for (let i = 0; i < x.length; i++) {
        sum += x[i] * y[i];
    }
    return sum;
}

function sumOfxSquared(x) {
    let sum = 0;
    for (let i = 0; i < x.length; i++) {
        sum += x[i] * x[i];
    }
    return sum;
}

function generateData(fn, i1, i2, step = 1) {
    const data = [];
    for (let x= i1; x<= i2; x += step) {
        data.push({x: x, y: fn(x)});
    }
    return data;
}

function linear_cmp() {
    const selectedbeertype = document.querySelector('input[name="beerselection"]:checked');
    if (!selectedbeertype) {
        console.log("no beer type selected");
        return;
    }
    const selectedvalue = parseInt(selectedbeertype.value.trim());


    let speed = [];
    let amount_completed = [];
    let failed = [];
    let failRate = [];

    //gives dataset based on checked radiobutton.
    switch (selectedvalue) {
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

    //Linear Regression y= ax+b. this is the a.
    const growthrate = (speed.length * sumOfxy(speed, failRate) - sumOfArray(speed) * sumOfArray(failRate)) /
        (speed.length * sumOfxSquared(speed) - (sumOfArray(speed) * sumOfArray(speed)));

    //Linear Regression: b from y = ax+b
    const intercept = (sumOfArray(failRate) - growthrate * sumOfArray(speed)) / (speed.length);

    //Linear Regression: making the function.
    const fn = x => growthrate * x + intercept;

    const minSpeed = Math.min(...speed);
    const maxSpeed = Math.max(...speed);

    //drawing the graph.
    const regressionData = generateData(fn, minSpeed, maxSpeed, 1);

    //update graph if new dataset chosen.
    if (currentChart) {
        currentChart.destroy();
        currentChart = null;
    }

    currentChart = new Chart(document.getElementById("myChart"), {
    type: 'line',
    data: {
        datasets: [
        {
            label: "Linear Regression: y = ax + b",
            data: regressionData,
            borderColor: "red",
            borderWidth: 2,
            tension: 0,
        },
        ]
    },
    options: {
        parsing: false,
        scales: {
        x: {
            type: 'linear',
            title: { display: true, text: "Speed" }
        },
        y: {
            title: { display: true, text: "Estimated failure rate(%)" }
        }
        }
    }
    });

    function setupVariables(batch) {
        batch.sort((a, b) => a.speed - b.speed);
        speed = batch.map(batch => batch.speed);
        amount_completed = batch.map(batch => batch.amount_completed);
        failed = batch.map(batch => batch.failed);
        failRate = failedRatio(failed, amount_completed);
    }
}


function LinearRegression() {
    const input = document.getElementById("InputPrediction");
    const result = document.getElementById("result");
    const selectedbeertype = document.querySelector('input[name="beerselection"]:checked');

    if (!selectedbeertype) {
        console.log("no beer type selected");
        return;
    }
    const selectedvalue = parseInt(selectedbeertype.value.trim());


    let speed = [];
    let amount_completed = [];
    let failed = [];
    let failRate = [];

    function setupVariables(batch) {
                batch.sort((a, b) => a.speed - b.speed);
                speed = batch.map(batch => batch.speed);
                amount_completed = batch.map(batch => batch.amount_completed);
                failed = batch.map(batch => batch.failed);
                failRate = failedRatio(failed, amount_completed);
    }

    //gives dataset based on checked radiobutton.
    switch (selectedvalue) {
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
            return;
    }

    //Linear Regression y= ax+b. this is the a.
    const growthrate = (speed.length * sumOfxy(speed, failRate) - sumOfArray(speed) * sumOfArray(failRate)) /
        (speed.length * sumOfxSquared(speed) - (sumOfArray(speed) * sumOfArray(speed)));

    //Linear Regression: b from y = ax+b
    const intercept = (sumOfArray(failRate) - growthrate * sumOfArray(speed)) / (speed.length);

    const inputValue = parseInt(input.value);

    if (isNaN(inputValue)) {
        result.textContent = "";
        return;
    }

    const equationValue = growthrate * inputValue + intercept;

    result.textContent = "Estimated failure rate: " + equationValue.toFixed(2) + "%";
}
