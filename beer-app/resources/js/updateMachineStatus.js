document.addEventListener("DOMContentLoaded", () => {
    
    async function loadMachineData(){
        const machineData = await FetchMachineStatus();
        console.log(machineData);
        if (machineData)
            UpdateUI(machineData)
    }

    // Update the machine status display
    function UpdateUI(machineStatus) {        
        const tempElement = document.getElementById("temperature-h2");
        if (tempElement) {
            tempElement.textContent = `${machineStatus.temperature.toFixed(1)}°C`;
        }
        const vibrationElement = document.getElementById("vibration-h2");
        if (vibrationElement) {
            vibrationElement.textContent = `${machineStatus.vibration.toFixed(3)}`;
        }
        const humidityElement = document.getElementById("humidity-h2");
        if (humidityElement) {
            humidityElement.textContent = `${machineStatus.humidity.toFixed(1)}%`;
        }

    }
    
    loadMachineData();
    setInterval(loadMachineData, 1000);
});

async function FetchMachineStatus() {
    try {
        const response = await fetch("api/status/machine");
        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }
        return await response.json();
    } catch (error) {
        console.error('Error fetching machine status:', error);
        return null;
    }
}

/* response example
{
  "speed": 33.333332,
  "ctrlcmd": 0,
  "temperature": 0,
  "vibration": 0,
  "humidity": 0,
  "stopReason": 0,
  "stateCurrent": 16
}
*/