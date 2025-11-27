document.addEventListener("DOMContentLoaded", () => {
    const idDiv = document.getElementById("batch-id");
    

    async function loadMachineData(){
        const machineData = await FetchMachineStatus();
        console.log(machineData);
        if (machineData)
            UpdateUI(machineData)
    }

    // Check if there is an error and display the mock object
    function UpdateUI(machineStatus) {        
        idDiv.textContent = machineStatus
        sizeDiv.textContent = machineStatus.toProduceAmount;
        completedDiv.textContent = machineStatus.producedAmount;
        failedDiv.textContent = machineStatus.defectiveAmount;
        ratioDiv.textContent = 0;
    }

    loadMachineData();
    setInterval(loadMachineData, 5000);
});

async function FetchMachineStatus() {
    const response = await fetch("http://localhost:8000/api/status/machine");
    return await response.json();
}