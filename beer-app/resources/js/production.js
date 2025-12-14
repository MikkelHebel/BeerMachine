(function () {
        const form = document.getElementById('production-form');
        const btnQueue = document.getElementById('btnQueue');
        

        const selectBeer = form.querySelector('select');
        const inputSpeed = form.querySelectorAll('input')[1]; 
        const inputQuantity = form.querySelectorAll('input')[2]; 
        const inputUser = form.querySelectorAll('input')[3]; 

        let isBatchActive = false;

        const beerTypes = window.beerTypes;

        const recommended = {
            0: 450,
            1: 152,
            2: 94,
            3: 100,
            4: 83,
            5: 91
        };

        const hintMax = document.getElementById('hintMax');
        const hintRec = document.getElementById('hintRec');

        selectBeer.addEventListener('change', () => {
            const selectedId = parseInt(selectBeer.value);
            const selectedType = beerTypes.find(t => t.mapped_type_id === selectedId);

            if (!selectedType) {
                hintMax.textContent = "*Max speed is 0.";
                hintRec.textContent = "*Recommended speed is 0.";
                inputSpeed.value = ""; 
                return;
            }

            const max = selectedType.upper_speed_limit;
            const rec = recommended[selectedId] ?? 0;

            hintMax.textContent = `*Max speed is ${max}.`;
            hintRec.textContent = `*Recommended speed is ${rec}.`;

            inputSpeed.value = rec;
        });

        inputSpeed.addEventListener('input', () => {
            const selectedId = parseInt(selectBeer.value);
            const selectedType = beerTypes.find(t => t.id === selectedId);

            const max = selectedType ? selectedType.upper_speed_limit : 0;

            let value = parseInt(inputSpeed.value);

            if (isNaN(value)) {
                inputSpeed.value = "";
                return;
            }

            if (value > max) value = max;
            if (value < 0) value = 0;

            inputSpeed.value = value;
        });

        btnQueue.addEventListener('click', (e) => {
            e.preventDefault();

            const beerTypeId = parseInt(selectBeer.value);
            const speed = parseInt(inputSpeed.value);
            const quantity = parseInt(inputQuantity.value);
            const userId = parseInt(inputUser.value);

            if (beerTypeId == null || isNaN(speed) || isNaN(quantity)) {
                window.toast('Fill all fields!');
                return;
            }

            document.getElementById('paramAmount').value = quantity;
            document.getElementById('paramSpeed').value = speed;
            document.getElementById('paramType').value = beerTypeId;
            document.getElementById('paramUser').value = userId;

            form.submit();

            clear();
            window.toast("Batch queued!");
        });

        const btnClear = document.getElementById('btnClear');

        btnClear.addEventListener('click', (e) => {
            e.preventDefault();

            clear();
        });

        const btnStart = document.getElementById('btnStart');

        btnStart.addEventListener('click', async (e) => {
            e.preventDefault();
            const form = document.getElementById('start-form');


            if (isBatchActive) {
                window.toast("A batch is already running. Please wait for it to finish.");
                return;
            }

            try {
                const res = await fetch("/api/status/queue");
                const queue = await res.json();

                const hasQueuedBatches = Array.isArray(queue) && queue.length > 0;

                if (!hasQueuedBatches) {
                    window.toast("No batches in queue. Please add one first.");
                    return;
                }

            } catch (err) {
                window.toast("Unable to check queue status. Try again.");
                return;
            }

            btnStart.closest('form').submit();

            window.toast("Batch started");
        });

        function clear() {
            selectBeer.selectedIndex = 0;

            inputSpeed.value = "";
            inputQuantity.value = "";

            hintMax.textContent = "*Max speed is 0.";
            hintRec.textContent = "*Recommended speed is 0.";
        }

        async function updateProgress() {
            try {
                const res = await fetch("/api/status/batch");
                const json = await res.json();

                const batch = Array.isArray(json) ? json[0] : json;

                if (!batch || !batch.toProduceAmount || !batch.producedAmount) return;

                isBatchActive = batch && batch.producedAmount < batch.toProduceAmount;

                const progress = Math.floor((batch.producedAmount / batch.toProduceAmount) * 100);

                const bar = document.querySelector(".progress-bar");
                bar.style.width = progress + "%";
                bar.textContent = progress + " %";

            } catch (err) {
                console.error("Progress error:", err);
            }
        }

        async function checkQueue() {
            try {
                const res = await fetch("/api/status/queue");
                const queue = await res.json();

                const btn = document.getElementById('btnStart');
                const msg = document.getElementById('queue-status');

                const hasQueuedBatches = Array.isArray(queue) && queue.length > 0;

                if (hasQueuedBatches) {
                    btn.disabled = false;
                    msg.textContent = "✓ Batch queued — ready to start";
                    msg.style.color = "#15803d";
                } else {
                    btn.disabled = true;
                    msg.textContent = "No batch queued — add one before starting";
                    msg.style.color = "#b91c1c";
                }

            } catch (error) {
                console.error("Queue check failed:", error);
            }
        }

    
    setInterval(checkQueue, 1500);
    setInterval(updateProgress, 1000);
})();