document.addEventListener("DOMContentLoaded", () => {
    const idDiv = document.getElementById("batch-id");
    const sizeDiv = document.getElementById("batch-size");
    const completedDiv = document.getElementById("amount-complete");
    const failedDiv = document.getElementById("amount-failed");
    const ratioDiv = document.getElementById("ratio");

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
        ratioDiv.textContent = 0;
    }

    loadBatchData();
    setInterval(loadBatchData, 5000);
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