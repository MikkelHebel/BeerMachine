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

            if (produced === 0) return;

            const currentFailureRate = failed / produced;

            const expectedFailureRate = 0.05;

            if (currentFailureRate > expectedFailureRate) {
                notify("Failure rate is out of bounds. Machine may need calibration!");
            }
        } catch (err) {
            console.error("Calibration error:", err);
        }
    }

    setInterval(checkCalibration, 3000);
})