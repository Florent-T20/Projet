<?php
require_once("access.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title>temporaire</title>
    <link href="starability-basic.css" rel="stylesheet" type="text/css" />
</head>
<body>


<h2>Laissez un commentaire !</h2>


<form action="add_review.php" method="POST">

    <!-- cf. Starability :) -->
    <fieldset class="starability-basic">
        <legend>Note :</legend>
        <input type="radio" id="no-rate" class="input-no-rate" name="rating" value="0" checked aria-label="No rating." />

        <input type="radio" id="rate1" name="rating" value="1" />
        <label for="rate1">1 star.</label>

        <input type="radio" id="rate2" name="rating" value="2" />
        <label for="rate2">2 stars.</label>

        <input type="radio" id="rate3" name="rating" value="3" />
        <label for="rate3">3 stars.</label>

        <input type="radio" id="rate4" name="rating" value="4" />
        <label for="rate4">4 stars.</label>

        <input type="radio" id="rate5" name="rating" value="5" />
        <label for="rate5">5 stars.</label>

        <span class="starability-focus-ring"></span>
    </fieldset>

    <textarea name="comment" rows="4" cols="50" placeholder="Votre commentaire"></textarea><br>

    <input type="submit" value="Publier">
</form>


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

    if (isUser() || isAdmin()) {
        // récupération des informations utilisateurs
        $user_id = $_SESSION['user_id'];
        // Recherche de l'utilisateur dans la base de données
        $stmt = $pdo->prepare("SELECT * FROM users WHERE user_id = :user_id");
        $stmt->execute(['user_id' => $user_id]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        echo "<i>Connecté en tant que <b>{$user['username']}</b></i>";
    }
    else {
        echo "<i>Connecté en tant que <b>{$_SESSION['role']}</b></i>";
    }
?>

<br />

<iframe 
    id="dynamicIframe" 
    src="get_review.php" 
    style="width: 90%; border: none; position: relative; background-color: white;">
</iframe>

<script src="../ajust_iframe.js"></script>

</body>
</html>
