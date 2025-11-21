(function () {
        const form = document.getElementById('production-form');
        const csrf = form.querySelector('input[name="_token"]').value;
        const btnSubmit = document.getElementById('btnSubmit');

        const selectBeer = form.querySelector('select');
        const inputSpeed = form.querySelectorAll('input')[1]; 
        const inputQuantity = form.querySelectorAll('input')[2]; 

        // Notify function (placeholder for the notification from Tobias)
        function notify(msg) {
            alert(msg);
            console.log(msg);
        }

        const beerTypeMap = {
            "Pilsner": 0,
            "Wheat": 1,
            "IPA": 2,
            "Stout": 3,
            "Ale": 4,
            "Alcohol Free": 5,
        };

        btnSubmit.addEventListener('click', async (e) => {
            console.log("Submit clicked")

            e.preventDefault();

            const beerType = selectBeer.value;
            const speed = parseInt(inputSpeed.value);
            const quantity = parseInt(inputQuantity.value);

            if (!beerType || isNaN(speed) || isNaN(quantity)) {
                notify('Fill all fields!');
                return;
            }

            const beerTypeId = beerTypeMap[beerType] ?? 0;
            
            try {
                // get machine status
                const machineRes = await fetch("/api/status/machine");
                const machine = await machineRes.json();
                const state = machine.state;

                console.log("Machine State:", state);

                // check if batch is running or what state it is in
                const isRunning = (state === 6); // execute
                const isReady = [2, 4, 17].includes(state); // stopped, idle, complete

                if (isRunning) {
                    notify("A batch is already running. Wait until it finishes.");
                    return;
                }

                if (!isReady) {
                    notify("Stopping and resetting");

                    await fetch("/api/command", {
                        method: "POST",
                        headers: { "Content-Type": "application/json", "X-CSRF-TOKEN": csrf },
                        body: JSON.stringify({ type: "stop" })
                    });
                    await new Promise(r => setTimeout(r, 800));

                    console.log("1");


                    await fetch("/api/command", {
                        method: "POST",
                        headers: { "Content-Type": "application/json", "X-CSRF-TOKEN": csrf },
                        body: JSON.stringify({ type: "reset" })
                    });
                    await new Promise(r => setTimeout(r, 800));

                    console.log("2");

                }

                const batchCommand = {
                    type: "batch",
                    parameters: {
                        amount: quantity,
                        speed: speed,
                        type: beerTypeId,  // should get the type from the db seeder
                        user: 1  // should get from log in
                    }
                };
                                console.log("3");


                // queue batch
                await fetch("/api/command", {
                    method: "POST",
                    headers: { "Content-Type": "application/json", "X-CSRF-TOKEN": csrf },
                    body: JSON.stringify(batchCommand)
                });

                console.log("4");


                // start batch
                await fetch("/api/command", {
                    method: "POST",
                    headers: { "Content-Type": "application/json", "X-CSRF-TOKEN": csrf },
                    body: JSON.stringify({ type: "start" })
                });

                notify("Batch queued and started!");

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