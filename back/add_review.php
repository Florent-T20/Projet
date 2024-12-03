<?php

require_once("access.php");


// Message d'information pour l'utilisateur
$message = "";

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
$user_id = $_SESSION['user_id'];
// Recherche de l'utilisateur dans la base de données
$stmt = $pdo->prepare("SELECT * FROM users WHERE user_id = :user_id");
$stmt->execute(['user_id' => $user_id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $comment = htmlspecialchars($_POST['comment']);
    $stmt = $pdo->prepare("INSERT INTO reviews (content) VALUES (:comment)");
    $stmt->bindParam(':comment', $comment);
    $stmt->execute();
    echo $message;
}

?>
