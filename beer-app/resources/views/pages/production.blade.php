<x-app>
    <x-notification></x-notification>
    <x-navigation-bar />

    <div class="flex justify-center items-center h-screen">
        <form action="{{ route('send.command') }}" method="POST" class="space-y-20" id="production-form">
            @csrf

            <div class="flex space-x-10">
                <select class="border rounded-xl py-4 px-2">
                    <option disabled selected hidden>Select clothing item</option>

                    <option>Pilsner</option>
                    <option>IPA</option>
                    <option>Stout</option>
                    <option>Ale</option>
                    <option>Alcohol Free</option>
                </select>

                <div>
                    <label>Speed</label>
                    <input class="border border-black rounded-lg hover:bg-gray-100">
                </div>

                <div>
                    <label>Quantity</label>
                    <input class="border border-black rounded-lg hover:bg-gray-100">
                </div>
            </div>

            <div class="flex space-x-10 justify-center">
                <button id="btnCalibrate" class="px-4 py-2 cursor-pointer border bg-yellow-100 hover:bg-yellow-300 rounded-lg">Calibrate</button>
                <button id="btnClear" class="px-4 py-2 cursor-pointer border bg-red-100 hover:bg-red-300 rounded-lg">Clear</button>
                <button id="btnSubmit" class="px-4 py-2 cursor-pointer border bg-green-100 hover:bg-green-300 rounded-lg">Submit</button>
            </div>
        </form>
    </div>

<script>
(function () {
    const form = document.getElementById('production-form');
    const csrf = form.querySelector('input[name="_token"]').value;
    const btnSubmit = document.getElementById('btnSubmit');

    const selectBeer = form.querySelector('select');
    const inputSpeed = form.querySelectorAll('input')[1]; 
    const inputQuantity = form.querySelectorAll('input')[2]; 

    function notify(msg) {
        alert(msg);
        console.log(msg);
    }

    btnSubmit.addEventListener('click', async (e) => {
        e.preventDefault();

        const beerType = selectBeer.value;
        const speed = parseInt(inputSpeed.value);
        const quantity = parseInt(inputQuantity.value);

        if (!beerType || isNaN(speed) || isNaN(quantity)) {
            notify('Fill all fields!');
            return;
        }

        const batchCommand = {
            type: "batch",
            parameters: {
                amount: quantity,
                speed: speed,
                type: 1,  // type db seeder
                user: 1  // get from log in
            }
        };

        try {
            const res1 = await fetch("http://localhost:8000/api/command", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrf,
                    'Accept': 'application/json'
                },
                body: JSON.stringify(batchCommand)
            });

            const data1 = await res1.json().catch(() => ({}));
            if (!res1.ok) {
                notify(`Batch queue failed: ${data1.message ?? res1.statusText}`);
                console.error('Error:', data1);
                return;
            }

            console.log('Batch queued successfully:', data1);

            // Start batch
            const res2 = await fetch("http://localhost:8000/api/command", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrf,
                    'Accept': 'application/json'
                },
                body: JSON.stringify({ type: "start" })
            });

            const data2 = await res2.json().catch(() => ({}));
            if (!res2.ok) {
                notify(`Batch start failed: ${data2.message ?? res2.statusText}`);
                console.error('Error:', data2);
                return;
            }

            notify('Batch queued and started! Check BeerMachine console.');
            console.log('Start command response:', data2);

        } catch (err) {
            notify(`Request error: ${err?.message ?? err}`);
            console.error(err);
        }
    });

    form.addEventListener('submit', (e) => e.preventDefault());
})();
</script>

</x-app>
