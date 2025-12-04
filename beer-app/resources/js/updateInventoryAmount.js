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
    setInterval(loadInventoryData, 1000);
});

async function FetchInventoryStatus() {
    const response = await fetch("api/status/inventory");
    return await response.json();
}

function updateInventoryBar(ingredientId, amount) {
    const container = document.getElementById(ingredientId);
    const bar = container.querySelector('#bar');
    const amountText = document.getElementById(`${ingredientId}-amount`);
    
    // Update bar height
    const clampedPercentage = Math.min(100, Math.max(0, amount));
    bar.style.height = `${clampedPercentage}%`;
    
    // Update amount text
    amountText.textContent = `${amount}`;
}

/*  "barley": 0,
    "hops": 0,
    "malt": 0,
    "wheat": 0,
    "yeast": 0,
    "fillingInventory": false */