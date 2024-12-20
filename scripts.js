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
document.addEventListener("DOMContentLoaded", function() {
  const removeButtons = document.querySelectorAll(".remove-item");
  const updateButtons = document.querySelectorAll(".update-quantity");

  // Supprimer un produit du panier
  removeButtons.forEach(function(button) {
    button.addEventListener("click", function() {
      const productRow = this.closest("tr");
      const productId = productRow.dataset.productId; // Assurez-vous que chaque ligne a un ID de produit unique

      // Envoyer la requête pour supprimer le produit (AJAX ou rechargement de page)
      fetch(`remove_product.php?product_id=${productId}`, {
        method: 'GET'
      }).then(response => response.json())
        .then(data => {
          if (data.success) {
            productRow.remove(); // Supprimer la ligne du panier après la suppression réussie
          } else {
            alert("Erreur lors de la suppression du produit.");
          }
        });
    });
  });

  // Mettre à jour la quantité d'un produit
  updateButtons.forEach(function(button) {
    button.addEventListener("click", function() {
      const productRow = this.closest("tr");
      const quantityInput = productRow.querySelector(".product-quantity");
      const newQuantity = quantityInput.value;
      const productId = productRow.dataset.productId; // Assurez-vous que chaque ligne a un ID de produit unique

      // Envoyer la requête pour mettre à jour la quantité (AJAX ou rechargement de page)
      fetch(`update_quantity.php?product_id=${productId}&quantity=${newQuantity}`, {
        method: 'GET'
      }).then(response => response.json())
        .then(data => {
          if (data.success) {
            alert("Quantité mise à jour avec succès.");
          } else {
            alert("Erreur lors de la mise à jour de la quantité.");
          }
        });
    });
  });
});
