<?php

// cf. le fichier
// permet de vérifier si un utilisateur est connecté ou non
require_once('back/access.php');

// on vérifie que l'utilisateur soit connecté
if (!isUser() && !isAdmin()) {
    echo '<script>alert("Vous devez être connecté pour ajouter un produit au panier.")</script>';
    echo '<script>window.location.href = "Projet.html";</script>';
    exit();
}

// connexion à la base de données
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

if (isset($_POST['produit_id']) && isset($_POST['quantite'])) {
    $produit_id = $_POST['produit_id'];
    $quantite = $_POST['quantite'];

    if (isUser() || isAdmin()) {
        $user_id = $_SESSION['user_id'];  // Récupère l'id de l'utilisateur connecté

        // Vérifier si le produit est déjà dans le panier
        $stmt = $pdo->prepare("SELECT * FROM panier WHERE produit_id = :produit_id AND user_id = :user_id");
        $stmt->execute([':produit_id' => $produit_id, ':user_id' => $user_id]);
        $existing_panier = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($existing_panier) {
            // Si le produit est déjà dans le panier, mettre à jour la quantité
            $new_quantite = $existing_panier['quantite'] + $quantite;
            $stmt = $pdo->prepare("UPDATE panier SET quantite = :quantite WHERE produit_id = :produit_id AND user_id = :user_id");
            $stmt->execute([':quantite' => $new_quantite, ':produit_id' => $produit_id, ':user_id' => $user_id]);
        } else {
            // Si le produit n'est pas dans le panier, l'ajouter
            $stmt = $pdo->prepare("INSERT INTO panier (user_id, produit_id, quantite) VALUES (:user_id, :produit_id, :quantite)");
            $stmt->execute([':user_id' => $user_id, ':produit_id' => $produit_id, ':quantite' => $quantite]);
        }

        echo '<script>alert("Produit ajouté au panier.")</script>';
        echo '<script>window.location.href = "test.php";</script>';
    }
}
?>
