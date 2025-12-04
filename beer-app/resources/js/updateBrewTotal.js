document.addEventListener("DOMContentLoaded", () => {
    
    async function loadMachineData(){
        const batchStats = await fetchBatchStatistics();
        
        console.log('Batch stats:', batchStats);
        
        UpdateUI(batchStats);
    }

    // Fetch batch statistics from your routes
    async function fetchBatchStatistics() {
        try {
            const [brewedRes, failedRes, ratioRes] = await Promise.all([
                fetch('/total-brewed'),
                fetch('/total-failed'), 
                fetch('/total-ratio')
            ]);
            
            const brewed = await brewedRes.json();
            const failed = await failedRes.json();
            const ratio = await ratioRes.json();
            
            return {
                totalBrewed: brewed.total_brewed,
                totalFailed: failed.total_failed,
                failureRatio: ratio.failure_ratio
            };
        } catch (error) {
            console.error('Error fetching batch statistics:', error);
            return null;
        }
    }

    function UpdateUI(batchStats) {        
        const totalBrewedElement = document.getElementById("total-brewed-h2");
        const totalFailedElement = document.getElementById("total-failed-id");
        const ratioElement = document.getElementById("ratio-id");
        
        if (totalBrewedElement) {
            totalBrewedElement.textContent = batchStats.totalBrewed.toLocaleString(); // Format with commas
        }
        
        if (totalFailedElement) {
            totalFailedElement.textContent = batchStats.totalFailed.toLocaleString();
        }
        
        if (ratioElement) {
            ratioElement.textContent = `${batchStats.failureRatio}%`;
        }
    }

    loadMachineData();
    setInterval(loadMachineData, 5000);
});