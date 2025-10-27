// public/js/toast.js

export function showToast(message, type = "success") {
  let toast = document.createElement("div");
  toast.className = `
    fixed top-6 right-6 z-50 px-4 py-3 rounded-xl shadow-lg text-white text-sm font-medium
    transition-transform transform translate-y-0 opacity-100
    ${type === "success" ? "bg-green-500" : type === "error" ? "bg-red-500" : "bg-blue-500"}
  `;
  toast.textContent = message;
  document.body.appendChild(toast);

  // Animate fade-out
  setTimeout(() => {
    toast.classList.add("opacity-0", "translate-y-2");
  }, 2000);

  // Remove after animation
  setTimeout(() => {
    toast.remove();
  }, 2500);
}
