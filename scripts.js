document.addEventListener("DOMContentLoaded", function() {
  const cartButton = document.getElementById("cart-button");
  const cartPopup = document.getElementById("cart-popup");
  const closePopupButton = document.getElementById("close-cart-btn");

  // Ouvrir le popup de panier
  cartButton.addEventListener("click", function() {
    cartPopup.classList.add("show");
  });

  // Fermer le popup de panier
  closePopupButton.addEventListener("click", function(event) {
    event.stopPropagation();  // Empêche la propagation de l'événement
    cartPopup.classList.remove("show");
  });

  // Si on clique en dehors du popup, fermer également le panier
  window.addEventListener("click", function(event) {
    if (cartPopup.classList.contains("show") && !cartPopup.contains(event.target) && event.target !== cartButton) {
      cartPopup.classList.remove("show");
    }
  });
});
