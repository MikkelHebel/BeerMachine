(function () {
        const form = document.getElementById('production-form');
        const csrf = form.querySelector('input[name="_token"]').value;
        const btnSubmit = document.getElementById('btnSubmit');
        

        const selectBeer = form.querySelector('select');
        const inputSpeed = form.querySelectorAll('input')[1]; 
        const inputQuantity = form.querySelectorAll('input')[2]; 
        const inputUser = form.querySelectorAll('input')[3]; 

        // Notify function (placeholder for the notification from Tobias)
        function notify(msg) {
            alert(msg);
            console.log(msg);
        }

        btnSubmit.addEventListener('click', async (e) => {
            console.log("Submit clicked")

            e.preventDefault();

            const beerTypeId = parseInt(selectBeer.value);
            const speed = parseInt(inputSpeed.value);
            const quantity = parseInt(inputQuantity.value);
            const userId = parseInt(inputUser.value);

            if (!beerTypeId || isNaN(speed) || isNaN(quantity)) {
                notify('Fill all fields!');
                return;
            }

            if (beerTypeId > 6 || beerTypeId < 1) {
                notify('beer type error');
                return;
            }
            
            try {
                const batchCommand = {
                    type: "batch",
                    parameters: {
                        amount: quantity,
                        speed: speed,
                        type: beerTypeId,
                        user: userId
                    }
                };

                // queue batch
                const response = await fetch("/api/command", {
                    method: "POST",
                    headers: { "Content-Type": "application/json", "X-CSRF-TOKEN": csrf },
                    body: JSON.stringify(batchCommand)
                });

                notify("Batch queued!");
                console.log(response);

            } catch (err) {
                notify("Error: " + err.message);
                console.error(err);
            }
        });

    form.addEventListener('submit', (e) => e.preventDefault());

    async function updateProgress() {
    try {
        const res = await fetch("/api/status/batch");
        const json = await res.json();

        const batch = Array.isArray(json) ? json[0] : json;

        if (!batch || !batch.toProduceAmount || !batch.producedAmount) return;

        const progress = Math.floor((batch.producedAmount / batch.toProduceAmount) * 100);

        const bar = document.querySelector(".progress-bar");
        bar.style.width = progress + "%";
        bar.textContent = progress + " %";

    } catch (err) {
        console.error("Progress error:", err);
    }
}

setInterval(updateProgress, 1000);
})();