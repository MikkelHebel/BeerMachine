(function () {
    const notify = (msg) => {
        window.dispatchEvent(new CustomEvent("notify", { detail: msg }));
    };

    async function checkCalibration() {
        try {
            const res = await fetch("/api/status/batch");
            const json = await res.json();
            const batch = Array.isArray(json) ? json[0] : json;

            if (!batch) return;

            const failed = batch.defectiveAmount;
            const produced = batch.producedAmount;

            // don't evaluate if there are less than 10 beers
            if (produced < 10) return;

            const currentFailureRate = failed / produced;

            const failureRateRes = await fetch(`/api/expected-failure-rate?speed=${batch.speed}`);
            const failureRateJson = await failureRateRes.json();

            const expectedFailureRate = failureRateJson.expectedFailureRate;

            if (expectedFailureRate === null || expectedFailureRate === undefined) return;

            const threshold = expectedFailureRate * 1.10;

            if (currentFailureRate > threshold) {
                notify("Failure rate is out of bounds. Machine may need calibration!");
            }

        } catch (err) {
            console.error("Calibration error:", err);
        }
    }

    setInterval(checkCalibration, 3000);
})