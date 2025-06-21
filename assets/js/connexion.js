const btnConnexion = document.getElementById("btnConnexion");
const overlay = document.getElementById("overlayConnexion");
const closeBtn = document.getElementById("closeOverlay");

btnConnexion.addEventListener("click", (e) => {
  e.preventDefault();
  overlay.style.display = "flex";

  // Réinitialiser l’animation du formulaire à chaque ouverture
  const content = document.querySelector(".overlay-content");
  content.style.animation = "none";
  void content.offsetWidth; // force le reflow
  content.style.animation = "popIn 0.4s ease forwards";
});

// Fermer l’overlay
closeBtn.addEventListener("click", () => {
  overlay.style.display = "none";
});

window.addEventListener("click", (e) => {
  if (e.target === overlay) {
    overlay.style.display = "none";
  }
});
