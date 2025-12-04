import './bootstrap';

setInterval(updateMaintenanceState, 1000);

async function updateMaintenanceState() {
    const response = await fetchMaintenanceStatus(); 
    
    if (response && response.MaintenanceState == true) {
        showMaintenanceNotification('System is under maintenance!');
    } else {
        // Remove notification if maintenance is over
        const existing = document.getElementById('maintenance-notification');
        if (existing) {
            existing.remove();
        }
    }
}

function showMaintenanceNotification(message) {
    // remove existing notification if present
    const existing = document.getElementById('maintenance-notification');
    if (existing) {
        existing.remove();
    }
    
    const notification = document.createElement('div');
    notification.id = 'maintenance-notification';
    notification.className = 'p-4 text-center bg-orange-500 text-white font-bold text-xl';
    notification.textContent = message;
    notification.style.position = 'fixed';
    notification.style.top = '0';
    notification.style.width = '100%';
    notification.style.zIndex = '9999';
    
    document.body.insertBefore(notification, document.body.firstChild);
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