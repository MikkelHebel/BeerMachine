import './bootstrap';

setInterval(updateMaintenanceState, 1000);

async function updateMaintenanceState() {
    const response = await fetchMaintenanceStatus(); 
    
    if (response && response.MaintenanceState == true) {
        await flashToSession('System is under maintenance!');
        window.location.reload(); // reload page
    }
}

async function fetchMaintenanceStatus() {
    try {
        const response = await fetch("api/status/maintenance");
        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }
        return await response.json();
    } catch (error) {
        console.error('Error fetching maintenance status:', error);
        return null;
    }
}

async function flashToSession(message) {
    try {
        const response = await fetch('/notify', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({
                message: message
            })
        });
        
        return await response.json();
    } catch (error) {
        console.error('Error flashing message:', error);
        return null;
    }
}