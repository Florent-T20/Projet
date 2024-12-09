<?php

require_once("access.php");


// Connexion à la base de données
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


// récupération des informations utilisateurs

// à finir !!!

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $comment = htmlspecialchars($_POST['comment']);
    $rating = $_POST['rating'];
    
    if (isUSer() || isAdmin()) {
        $user_id = $_SESSION['user_id'];

        // Recherche de l'utilisateur dans la base de données
        $stmt = $pdo->prepare("SELECT * FROM users WHERE user_id = :user_id");
        $stmt->execute(['user_id' => $user_id]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        $stmt = $pdo->prepare("INSERT INTO reviews (user_id, rating, comment) VALUES (:user_id, :rating, :comment)");
        $stmt->execute([
            'user_id' => $user_id,
            'rating' => $rating,
            'comment' => $comment]);
    } else {
        $stmt = $pdo->prepare("INSERT INTO reviews (rating, comment) VALUES (:rating, :comment)");
        $stmt->execute([
            'rating' => $rating,
            'comment' => $comment]);
    }
    echo "Message publié avec succès !<br />";
    echo "<a href='reviews.php'>Retour</a>";

}

?>
