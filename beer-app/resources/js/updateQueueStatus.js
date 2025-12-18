// Beer type mapping
const BEER_TYPES = {}
window.beerTypes.forEach(type => {
        BEER_TYPES[type.mapped_type_id] = type.name;
});

document.addEventListener("DOMContentLoaded", () => {
    const queueDiv = document.getElementById("queue")

    async function loadQueueData() {
        const queueData = await fetchQueueData();
        console.log(queueData);
        
        if (queueData) {
            UpdateUI(queueData);    
        }
    }

    function UpdateUI(queue) {
        queueDiv.innerHTML = ``;    // Clear queue contents

        queue.forEach(batch => {
            const batchElement = document.createElement("div");             // create div for the batch
            const beerTypeName = BEER_TYPES[batch.type] || `Unknown (${batch.type})`;
            
            batchElement.innerHTML = `
            Amount: ${batch.amount}<br> 
            Speed: ${batch.speed}<br> 
            Type: ${beerTypeName}`;
            
            batchElement.className = "queue-item";         
            queueDiv.appendChild(batchElement); 
        });
    }

    loadQueueData();
    setInterval(loadQueueData, 5000);
});

async function fetchQueueData() {
    const response = await fetch("/api/status/queue");
    return await response.json();
}

/*
sample response
    [
        {"id":null,"amount":50,"speed":100,"type":1,"userId":1,"defectiveAmount":0,"producedAmount":0},
        {"id":null,"amount":50,"speed":100,"type":1,"userId":1,"defectiveAmount":0,"producedAmount":0},
        {"id":null,"amount":50,"speed":100,"type":1,"userId":1,"defectiveAmount":0,"producedAmount":0}
    ]
*/
