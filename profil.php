<?php

require_once('back/access.php');

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon profil</title>
</head>
<body>

<?php
// Vérifier si la session utilisateur est active
if (isAdmin() || isUser()) {

    // Si la session existe, afficher le formulaire
    echo '<form action="back/logout.php" method="post">
            <button type="submit">Se déconnecter</button>
          </form>';

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

    // Affichage des informations utilisateur
    echo "<h2>Voici le profil de {$user['username']}</h2>
          <div>Quelques informations sur vous : </div>
            <ul>
                <li>Votre id est : {$user['user_id']}</li>
                <li>Votre mail est : {$user['email']}</li>
                <li>Votre rôle est : {$user['role']}</li>
                <li>Votre compte a été créé le : {$user['created_at']}</li>
            </ul>";

} else {
    // Sinon, afficher un message ou rediriger vers une page de connexion
    echo '<p>Veuillez vous connecter pour accéder à ce formulaire.</p>';
}

echo '<a href="Projet.html">Retourner à l\'accueil.</a>';

?>

</body>
</html>
