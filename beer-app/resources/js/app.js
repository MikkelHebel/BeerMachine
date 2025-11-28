import './bootstrap';

document.addEventListener('DOMContentLoaded', function() {
    const barleyInv = document.getElementById('barley-inv');
    const hopsInv = document.getElementById('hops-inv');
    const maltInv = document.getElementById('malt-inv');
    const wheatInv = document.getElementById('wheat-inv');
    const yeastInv = document.getElementById('yeast-inv');

    async function LoadInventoryData() {
        const inventoryData = await FetchInventoryStatus();
        console.log(inventoryData);
        // Find a way to get inventory data and update a stored const with amount
        // if(inventoryData <= 0) {
        //     console.log("Inventory needs refill!");
        // }
    }

    LoadInventoryData();
    setInterval(LoadInventoryData, 5000);
});

async function FetchInventoryStatus() {
    const response = await fetch("http://localhost:8000/api/status/inventory")
    const inventory = await response.json();
}