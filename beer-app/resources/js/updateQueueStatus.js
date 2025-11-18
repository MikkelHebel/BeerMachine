document.addEventListener("DOMContentLoaded", () => {
    const queueDiv = document.getElementById("queue")

    async function loadQueueData() {
        const queueData = await loadQueueData();
        console.log(queueData);
        if (queueData)
            UpdateUI(queueData);
    }

    function UpdateUI(queueStatus) {
        for (let index = 0; index < queueStatus.length; index++) {
            const batchElement = document.createElement("div"); // create div for the batch
            const batch = queueStatus[index];                   // get the batch
            batchElement.textContent = "Batch id: ";
            batchElement.textContent += batch.batchId;           
            queueDiv.appendChild(batchElement);  
        }        
    }

    loadQueueData();
    setInterval(loadQueueData, 5000);
});

async function loadQueueData() {
    const response = await fetch("http://localhost:8000/api/status/queue");
    return await response.json();
}