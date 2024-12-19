document.addEventListener("DOMContentLoaded", function() {
  // Écouteur pour le bouton "Mon Panier"
  const cartButton = document.getElementById("cart-button");
  const cartPopup = document.getElementById("cart-popup");
  const closePopupButton = document.getElementById("close-cart-btn");

  // Ouvrir le popup de panier
  cartButton.addEventListener("click", function() {
    if (!cartPopup.classList.contains("show")) {
      cartPopup.classList.add("show");  // Ajoute la classe pour afficher le panier
    }
  });

  // Fermer le popup de panier
  closePopupButton.addEventListener("click", function(event) {
    event.stopPropagation();  // Empêche la propagation de l'événement
    cartPopup.classList.remove("show");  // Retire la classe pour masquer le panier
  });

  // Si on clique en dehors du popup, fermer également le panier
  window.addEventListener("click", function(event) {
    if (event.target === cartPopup) {
      cartPopup.classList.remove("show");  // Ferme le panier si l'utilisateur clique en dehors
    }
  });
});
