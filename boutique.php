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


// connexion à la base de donées
$host = 'localhost';   // immuable
$dbname = 'bdd_temp';  // nom temporaire, à modifier au besoin
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
    die("Erreur lors de la récupération des données de la boutique : " . $e->getMessage());
}


// Récupérer les produits dans le panier de l'utilisateur (il est vide...)

if (isUser() || isAdmin()) $user_id = $_SESSION['user_id'];  // là on récupère juste l'id de l'utilisateur


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

        $commande_query = "INSERT INTO commandes (utilisateur_id, prix_total) VALUES ($utilisateur_id, $prix_total)";
        mysqli_query($conn, $commande_query);
        $commande_id = mysqli_insert_id($conn);

        // Ajouter les tickets dans la table commande_tickets
        foreach ($panier as $produit) {
            $quantite = $produit['quantite'];
            if ($produit['type'] == 'ticket') {
                $date_reservation = $_POST['date_reservation_' . $produit['id']];
            } else {
                $date_reservation = NULL;
            }

            for ($i = 0; $i < $quantite; $i++) {
                $ticket_query = "INSERT INTO commande_tickets (commande_id, produit_id, quantite, date_reservation) 
                                 VALUES ($commande_id, {$produit['id']}, 1, '$date_reservation')";
                mysqli_query($conn, $ticket_query);
            }
        }

        // Vider le panier après la commande
        $empty_cart_query = "DELETE FROM panier WHERE utilisateur_id = $utilisateur_id";
        mysqli_query($conn, $empty_cart_query);

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
</head>
<body>
    <!-- commenraire temporaire
    <header>
        <div class="logo">Boutique</div>
        <nav>
            <a href="">Accueil</a>
            <a href="">Boutique</a>
            <a href="">Panier</a>
            <a href="">Déconnexion</a>
        </nav>
    </header>
-->

    <main>
        <section class="produits">
            <h1>Nos produits</h1>
            <div class="produits-list">
                <?php foreach ($produits as $produit): ?>
                    <div class="produit">
                        <img src="<?= htmlspecialchars($produit['image']) ?>">
                        <h3><?= htmlspecialchars($produit['nom']) ?></h3>
                        <p><?= nl2br(htmlspecialchars($produit['description'])) ?></p>
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

        <!-- je mets ça en commentaire temporairement pour mes tests, parce que la table panier est vide en plus de ne pas être rempli. Perso je trouve ça maladroit de mettre un panier dans la base de données. En vrai pour le panier l'affichage suffit, donc soit en html directement soit en js. 

        <section class="panier">
            <h2>Votre panier</h2>
            <form method="POST" action="boutique.php">
                <table>
                    <tr>
                        <th>Produit</th>
                        <th>Quantité</th>
                        <th>Prix</th>
                        <th>Date de réservation</th>
                    </tr>
                    <?php foreach ($panier as $produit): ?>
                        <tr>
                            <td><?= $produit['nom'] ?></td>
                            <td><?= $produit['quantite'] ?></td>
                            <td><?= $produit['prix'] ?> €</td>
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
                <button type="submit" name="checkout">Passer à la caisse</button>
            </form>
        </section>
    -->
    </main>
</body>
</html>
