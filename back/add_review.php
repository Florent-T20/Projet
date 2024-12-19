<?php

require_once("access.php");


$host = 'localhost';
$dbname = 'projet_web_2425';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $comment = htmlspecialchars($_POST['comment']);
    $rating = $_POST['rating'];
    
    if (isUSer() || isAdmin()) {
        $user_id = $_SESSION['user_id'];

        // Recherche de l'utilisateur dans la base de données
        $stmt = $pdo->prepare("SELECT * FROM users WHERE user_id = :user_id");
        $stmt->execute(['user_id' => $user_id]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // on vérifie si le cookie enclos_id existe
        if (isset($_COOKIE['enclos_id'])) {
            $enclos_id = intval($_COOKIE['enclos_id']);
            $stmt = $pdo->prepare("INSERT INTO reviews (user_id, rating, comment, enclosure_id) VALUES (:user_id, :rating, :comment, :enclosure_id)");
            $stmt->execute([
                'user_id' => $user_id,
                'rating' => $rating,
                'comment' => $comment,
                'enclosure_id' => $enclos_id]);
        } else {

            $stmt = $pdo->prepare("INSERT INTO reviews (user_id, rating, comment) VALUES (:user_id, :rating, :comment)");
            $stmt->execute([
                'user_id' => $user_id,
                'rating' => $rating,
                'comment' => $comment]);
        }
    } else {
        if (isset($_COOKIE['enclos_id'])) {
            $enclos_id = intval($_COOKIE['enclos_id']);
            $stmt = $pdo->prepare("INSERT INTO reviews (rating, comment, enclosure_id) VALUES (:rating, :comment, :enclosure_id)");
            $stmt->execute([
                'rating' => $rating,
                'comment' => $comment,
                'enclosure_id' => $enclos_id]);      
        } else {
            $stmt = $pdo->prepare("INSERT INTO reviews (rating, comment) VALUES (:rating, :comment)");
            $stmt->execute([
                'rating' => $rating,
                'comment' => $comment]);
        }
    }
    echo "Message publié avec succès !<br />";

    // Vérifier si le cookie existe
    if (isset($_COOKIE['enclos_id'])) {
        // Supprimer le cookie en le réinitialisant avec une date d'expiration passée
        setcookie('enclos_id', '', time() - 3600, "/");
    }
    
    echo "<a href='reviews.php'>Retour</a>";

}

?>
