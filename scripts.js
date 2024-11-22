// Tableau pour stocker les articles dans le panier
let cart = [];

// Sélectionner les éléments nécessaires
const cartButton = document.getElementById('cart-button');
const cartContainer = document.getElementById('cart');
const cartItemsList = document.getElementById('cart-items');
const cartTotal = document.getElementById('cart-total');

// Charger le panier depuis le localStorage (si disponible)
function loadCartFromLocalStorage() {
  const savedCart = localStorage.getItem('cart');
  if (savedCart) {
    cart = JSON.parse(savedCart);
    updateCart();
  }
}

// Sauvegarder le panier dans le localStorage
function saveCartToLocalStorage() {
  localStorage.setItem('cart', JSON.stringify(cart));
}

// Fonction pour mettre à jour le panier
function updateCart() {
  cartItemsList.innerHTML = '';
  let total = 0;

  // Créer une nouvelle liste d'articles dans le panier
  cart.forEach(item => {
    const listItem = document.createElement('li');
    listItem.textContent = `${item.name} - €${item.price.toFixed(2)} x ${item.quantity}`;
    cartItemsList.appendChild(listItem);

    total += item.price * item.quantity;
  });

  // Mettre à jour le total du panier
  cartTotal.textContent = `€${total.toFixed(2)}`;

  // Sauvegarder dans le localStorage
  saveCartToLocalStorage();
}

// Ajouter un article au panier
function addToCart(event) {
  const offer = event.target.closest('.offer');
  const name = offer.querySelector('h3').textContent;
  const price = parseFloat(offer.querySelector('.price').textContent.replace('€', ''));

  // Vérifier si l'article est déjà dans le panier
  const existingItem = cart.find(item => item.name === name);

  if (existingItem) {
    // Si l'article existe déjà, augmenter sa quantité
    existingItem.quantity += 1;
  } else {
    // Sinon, ajouter un nouvel article avec quantité 1
    cart.push({ name, price, quantity: 1 });
  }

  // Mettre à jour le panier
  updateCart();
}

// Ajouter des événements aux boutons "Ajouter au panier"
document.addEventListener('click', (event) => {
  if (event.target && event.target.classList.contains('add-to-cart')) {
    addToCart(event);
  }
});

// Fonction pour afficher/masquer le panier
cartButton.addEventListener('click', () => {
  cartContainer.classList.toggle('hidden');
});

// Gestion du bouton de passage à la caisse
document.getElementById('checkout-btn').addEventListener('click', () => {
  if (cart.length === 0) {
    alert('Votre panier est vide. Veuillez ajouter des articles avant de passer à la caisse.');
  } else {
    alert('Merci pour votre achat!');
    cart = [];
    updateCart();
    cartContainer.classList.add('hidden');
  }
});

// Charger le panier au démarrage
window.addEventListener('load', loadCartFromLocalStorage);
