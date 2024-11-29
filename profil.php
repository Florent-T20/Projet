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

    // DEBUT SECTION ADMIN
    if (isAdmin()) {

        // Traitement des actions : ajout, modification, suppression d'utilisateurs
        $message = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $action = $_POST['action'];

            // Ajouter un utilisateur
            if ($action === 'add') {
                $username = $_POST['username'];
                $email = $_POST['email'];
                $role = $_POST['role'];
                $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

                $stmt = $pdo->prepare("INSERT INTO users (username, email, role, password) VALUES (:username, :email, :role, :password)");
                $stmt->execute([
                    'username' => $username,
                    'email' => $email,
                    'role' => $role,
                    'password' => $password
                ]);
                $message = "Utilisateur ajouté avec succès !";

            // Modifier un utilisateur
            } elseif ($action === 'edit') {
                $user_id = $_POST['user_id'];
                $email = $_POST['email'];
                $role = $_POST['role'];

                $stmt = $pdo->prepare("UPDATE users SET email = :email, role = :role WHERE user_id = :user_id");
                $stmt->execute([
                    'email' => $email,
                    'role' => $role,
                    'user_id' => $user_id
                ]);
                $message = "Utilisateur modifié avec succès !";

            // Supprimer un utilisateur
            } elseif ($action === 'delete') {
                $user_id = $_POST['user_id'];

                $stmt = $pdo->prepare("DELETE FROM users WHERE user_id = :user_id");
                $stmt->execute(['user_id' => $user_id]);
                $message = "Utilisateur supprimé avec succès !";
            }
        }

        echo "<p>$message</p>";

        echo '    
            <!-- Formulaire pour ajouter un utilisateur -->
            <h2>Ajouter un utilisateur</h2>
            <form method="POST">
                <input type="hidden" name="action" value="add">
                <label for="username">Nom d\'utilisateur :</label>
                <input type="text" name="username" required><br>

                <label for="email">Email :</label>
                <input type="email" name="email" required><br>

                <label for="role">Rôle :</label>
                <select name="role" required>
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select><br>

                <label for="password">Mot de passe :</label>
                <input type="password" name="password" required><br>

                <button type="submit">Ajouter</button>
            </form>

            <!-- Formulaire pour modifier un utilisateur -->
            <h2>Modifier un utilisateur</h2>
            <form method="POST">
                <input type="hidden" name="action" value="edit">
                <label for="user_id">ID de l\'utilisateur :</label>
                <input type="number" name="user_id" required><br>

                <label for="email">Email :</label>
                <input type="email" name="email" required><br>

                <label for="role">Rôle :</label>
                <select name="role" required>
                    <option value="user">Utilisateur</option>
                    <option value="admin">Administrateur</option>
                </select><br>

                <button type="submit">Modifier</button>
            </form>

            <!-- Formulaire pour supprimer un utilisateur -->
            <h2>Supprimer un utilisateur</h2>
            <form method="POST">
                <input type="hidden" name="action" value="delete">
                <label for="user_id">ID de l\'utilisateur :</label>
                <input type="number" name="user_id" required><br>

                <button type="submit">Supprimer</button>
            </form>';

    }

} else {
    // Sinon, afficher un message ou rediriger vers une page de connexion
    echo '<p>Veuillez vous connecter pour accéder à ce formulaire.</p>';
}

echo '<a href="Projet.html">Retourner à l\'accueil.</a>';

?>





</body>
</html>
