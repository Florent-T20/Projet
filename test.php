<?php

// cf. le fichier
// permet de vérifier si un utilisateur est connecté ou non
require_once('back/access.php');

// on vérifie que l'utilisateur soit connecté
if (!isUser() && !isAdmin()) {
    echo '<script>alert("Vous devez être connecté pour accéder à la boutique.")</script>';
    echo '<script>window.location.href = "Projet.html";</script>';
    exit();
}

// connexion à la base de données
$host = 'localhost';   // immuable
$dbname = 'projet_web_2425';  // nom temporaire, à modifier au besoin
$user = 'root';        // immuable
$pass = '';            // immuable

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}

// on récupère tous les produits de la boutique
try {
    $stmt = $pdo->query("SELECT * FROM produits");
    $produits = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Erreur lors de la récupération des produits : " . $e->getMessage());
}

// Initialiser le panier
$panier = [];

if (isUser() || isAdmin()) {
    $user_id = $_SESSION['user_id'];  // Récupère l'id de l'utilisateur connecté

    // Récupérer les produits dans le panier de l'utilisateur
    try {
        // Utilisez 'user_id' au lieu de 'utilisateur_id' dans la clause WHERE
        $stmt = $pdo->prepare("SELECT p.*, pi.quantite FROM panier pi JOIN produits p ON pi.produit_id = p.id WHERE pi.user_id = :user_id");
        $stmt->execute([':user_id' => $user_id]);
        $panier = $stmt->fetchAll(PDO::FETCH_ASSOC);  // Récupère les produits dans le panier
    } catch (PDOException $e) {
        die("Erreur lors de la récupération du panier : " . $e->getMessage());
    }
}

// Traitement de la commande lors du clic sur le bouton "Passer à la caisse"
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['checkout'])) {
    // Vérifier que tous les tickets ont une date de réservation
    $erreur_reservation = false;
    foreach ($panier as $produit) {
        if ($produit['type'] == 'ticket' && empty($_POST['date_reservation_' . $produit['id']])) {
            $erreur_reservation = true;
            break;
        }
    }

    if ($erreur_reservation) {
        echo '<script>alert("Veuillez spécifier les dates de réservation pour tous les tickets.")</script>';
    } else {
        // Créer une commande
        $prix_total = 0;
        foreach ($panier as $produit) {
            $prix_total += $produit['prix'] * $produit['quantite'];
        }

        // Ajouter la commande dans la base de données
        $commande_query = "INSERT INTO commandes (utilisateur_id, prix_total) VALUES ($user_id, $prix_total)";
        $pdo->query($commande_query);
        $commande_id = $pdo->lastInsertId();

        // Ajouter les tickets dans la table commande_tickets
        foreach ($panier as $produit) {
            $quantite = $produit['quantite'];
            $date_reservation = $produit['type'] == 'ticket' ? $_POST['date_reservation_' . $produit['id']] : NULL;

            for ($i = 0; $i < $quantite; $i++) {
                $ticket_query = "INSERT INTO commande_tickets (commande_id, produit_id, quantite, date_reservation) 
                                 VALUES ($commande_id, {$produit['id']}, 1, '$date_reservation')";
                $pdo->query($ticket_query);
            }
        }

        // Vider le panier après la commande
        $empty_cart_query = "DELETE FROM panier WHERE user_id = $user_id";
        $pdo->query($empty_cart_query);

        echo '<script>alert("Commande passée avec succès !")</script>';
    }
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boutique</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="boutique.css">
</head>
<body>
<header>
    <img src="images/craiyon.png" class="image2">
    <nav class="navigation">
        <a href="Projet.html">Home</a>
        <a href="zoo/carousel/index.html">Animaux</a>
        <span class="menu-item">
            <a>Services</a>
            <ul class="submenu">
                <li><a href="#">Boutique</a></li>
                <li><a href="services.html">Autres</a></li>
            </ul>
        </span>
        <a href="contact.html">Contact</a>
        <a href="avis.html">Avis</a>
        <button id="cart-button">Mon Panier</button>
        <a href="profil.html">Profil</a>
        <button class="btnLogin-popup">Login</button>
    </nav>
</header>

<main>
    <section class="offers">
        <h1>Nos produits</h1>
        <div class="produits-list">
            <?php foreach ($produits as $produit): ?>
                <div class="offer">
                    <h3><?= htmlspecialchars($produit['nom']) ?></h3>
                    <p><?= nl2br(htmlspecialchars($produit['description'])) ?></p>
                    <?php
                    if ($produit['type'] == 'objet') {
                        // Si le type est "objet", afficher l'image du produit
                        echo '<img src="' . htmlspecialchars($produit['image']) . '" alt="Image du produit">';
                    }
                    ?>
                    <p>Prix: <?= htmlspecialchars($produit['prix']) ?> €</p>
                    <form method="POST" action="ajouter_panier.php">
                        <input type="hidden" name="produit_id" value="<?= $produit['id'] ?>">
                        <input type="number" name="quantite" min="1" value="1">
                        <button type="submit">Ajouter au panier</button>
                    </form>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <!-- Popup de panier -->
    <div id="cart-popup" class="cart-popup">
        <div class="cart-popup-content">
            <h2>Votre panier</h2>
            <table>
                <tr>
                    <th>Produit</th>
                    <th>Quantité</th>
                    <th>Prix</th>
                    <th>Date de réservation</th>
                </tr>
                <?php foreach ($panier as $produit): ?>
                    <tr>
                        <td><?= htmlspecialchars($produit['nom']) ?></td>
                        <td><?= htmlspecialchars($produit['quantite']) ?></td>
                        <td><?= htmlspecialchars($produit['prix']) ?> €</td>
                        <td>
                            <?php if ($produit['type'] == 'ticket'): ?>
                                <input type="date" name="date_reservation_<?= $produit['id'] ?>" required>
                            <?php else: ?>
                                N/A
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <form method="POST" action="test.php">
                <button type="submit" name="checkout">Passer à la caisse</button>
            </form>
            <button id="close-cart-btn">Fermer</button>
        </div>
    </div>
</main>

<script src="script.js"></script>
<script src="scripts.js"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
