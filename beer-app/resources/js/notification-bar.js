window.toast = function(message) {
    const toast = document.createElement("div");
    toast.className = "toast show";

    toast.innerHTML = `
        <span>${message}</span>
        <button class="toast-close">&times;</button>
    `;

    const container = document.getElementById("toast-container");
    container.appendChild(toast);

    setTimeout(() => hideToast(toast), 3000);

    toast.querySelector(".toast-close").addEventListener("click", () => hideToast(toast));
};

function hideToast(toast) {
    toast.classList.remove("show");
    toast.classList.add("hide");
    setTimeout(() => toast.remove(), 300);
}
