<?php
require_once("access.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title>temporaire</title>
</head>
<body>

<h2>Laissez un commentaire !</h2>

<?php
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

    if (isUser()) {
        echo "<h5>Connecté en tant que {$user['username']}</h5>";
    }
    else if (isAdmin()) {
        echo "<h5>Connecté en tant que {$user['username']}</h5>";
    }
?>


<form action="add_review.php" method="POST">
  <textarea name="comment" rows="5" cols="50" placeholder="Votre commentaire"></textarea><br>
  <input type="submit" value="Publier">
</form>


<iframe 
    id="dynamicIframe" 
    src="get_review.php" 
    style="width: 100%; border: none; position: relative; top: 1000px; background-color: white;" scrolling="no">
</iframe>



</body>
</html>
