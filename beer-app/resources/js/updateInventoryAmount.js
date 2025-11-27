document.addEventListener("DOMContentLoaded", () => {

    async function loadInventoryData(){
        const inventoryData = await FetchInventoryStatus();
        console.log(inventoryData);
        if (inventoryData)
            UpdateUI(inventoryData)
    }

    // Check if there is an error and display the mock object
    function UpdateUI(data) {        
        updateInventoryBar('barley', data.barley);
        updateInventoryBar('hops', data.hops);
        updateInventoryBar('malt', data.malt);
        updateInventoryBar('wheat', data.wheat);
        updateInventoryBar('yeast', data.yeast);
    }

    loadInventoryData();
    setInterval(loadInventoryData, 5000);
});

async function FetchInventoryStatus() {
    const response = await fetch("http://localhost:8000/api/status/inventory");
    return await response.json();
}

function updateInventoryBar(ingredientId, percentage) {
    const container = document.getElementById(ingredientId);
    const bar = container.querySelector('#bar');
    bar.style.height = `${Math.min(100, Math.max(0, percentage))}%`;
}

/*  "barley": 0,
    "hops": 0,
    "malt": 0,
    "wheat": 0,
    "yeast": 0,
    "fillingInventory": false */