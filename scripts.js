// scripts.js

// Tableau pour stocker les articles dans le panier
let cart = [];

// Sélectionner les boutons "Ajouter au panier"
const addToCartButtons = document.querySelectorAll('.add-to-cart');

// Sélectionner le bouton panier et le conteneur du panier
const cartButton = document.getElementById('cart-button');
const cartContainer = document.getElementById('cart');

// Fonction pour mettre à jour le panier
function updateCart() {
  const cartItemsList = document.getElementById('cart-items');
  const cartTotal = document.getElementById('cart-total');
  
  // Vider la liste actuelle des articles dans le panier
  cartItemsList.innerHTML = '';
  
  let total = 0;
  
  // Créer une nouvelle liste d'articles dans le panier
  cart.forEach(item => {
    const listItem = document.createElement('li');
    listItem.textContent = `${item.name} - €${item.price.toFixed(2)}`;
    cartItemsList.appendChild(listItem);
    total += item.price;
  });

  // Mettre à jour le total du panier
  cartTotal.textContent = `€${total.toFixed(2)}`;
}

// Ajouter un article au panier
function addToCart(event) {
  const offer = event.target.closest('.offer');
  const name = offer.querySelector('h3').textContent;
  const price = parseFloat(offer.querySelector('.price').textContent.replace('€', ''));

  // Ajouter l'article au tableau du panier
  cart.push({ name, price });
  
  // Mettre à jour l'affichage du panier
  updateCart();
}

// Ajouter des événements aux boutons "Ajouter au panier"
addToCartButtons.forEach(button => {
  button.addEventListener('click', addToCart);
});

// Fonction pour afficher/masquer le panier
cartButton.addEventListener('click', () => {
  cartContainer.classList.toggle('hidden');
});

// Gestion du bouton de passage à la caisse (optionnel)
document.getElementById('checkout-btn').addEventListener('click', () => {
  if (cart.length > 0) {
    alert('Merci pour votre achat!');
    cart = []; // Vider le panier après l'achat
    updateCart(); // Réinitialiser le panier affiché
    cartContainer.classList.add('hidden'); // Cacher le panier après l'achat
} else {
  alert('Votre panier est vide.');
}
});