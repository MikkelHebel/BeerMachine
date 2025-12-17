const BEER_TYPES = {}
window.beerTypes.forEach(type => {
        BEER_TYPES[type.id] = type.name;
});

document.addEventListener("DOMContentLoaded", () => {



    const idDiv = document.getElementById("batch-id");
    const sizeDiv = document.getElementById("batch-size");
    const completedDiv = document.getElementById("amount-complete");
    const failedDiv = document.getElementById("amount-failed");
    const ratioDiv = document.getElementById("ratio");
    const beerType = document.getElementById("beerType");


    async function loadBatchData(){
        const batchData = await FetchBatchStatus();
        console.log(batchData);
        if (batchData)
            UpdateUI(batchData)
    }

    // Check if there is an error and display the mock object
    function UpdateUI(batchStatus) {        
        idDiv.textContent = batchStatus.batchId;
        sizeDiv.textContent = batchStatus.toProduceAmount;
        completedDiv.textContent = batchStatus.producedAmount;
        failedDiv.textContent = batchStatus.defectiveAmount;
        
        beerType.textContent = BEER_TYPES[batchStatus.beerType] || ``;
        ratioDiv.textContent = batchStatus.defectiveAmount == 0 ? 100 + '%' : (batchStatus.defectiveAmount / batchStatus.producedAmount)*100+'%';
    }

    loadBatchData();
    setInterval(loadBatchData, 1000);
});

async function FetchBatchStatus() {
    const response = await fetch("/api/status/batch");
    return await response.json();
}
/* 
    {
        "batchId": 0,
        "beerType": 0,
        "speed": 0,
        "toProduceAmount": 0,
        "producedAmount": 0,
        "defectiveAmount": 0,
        "userId": 0,
        "failureRate": 0
    }
*/