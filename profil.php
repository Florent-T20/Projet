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

            // deplacer un animal
            elseif ($action === 'move_animal') {
                $animal_id = $_POST['animal_id'];
                $enclosure_id = $_POST['enclosure_id'];

                $stmt = $pdo->prepare("UPDATE animals SET enclosure_id = :enclosure_id WHERE animal_id = :animal_id");
                $stmt->execute([
                    'animal_id' => $animal_id,
                    'enclosure_id' => $enclosure_id]);
                $message = "Animal déplacé avec succès !";
            }

            // modifier horaire de repas
            elseif ($action === 'edit_horaire') {
                $sched_id = $_POST['sched_id'];
                $horaire = $_POST['horaire'];

                $stmt = $pdo->prepare("UPDATE schedules SET feeding_time = :horaire WHERE schedule_id = :sched_id");
                $stmt->execute([
                    'sched_id' => $sched_id,
                    'horaire' => $horaire]);
                $message = "Horaire de repas modifié avec succès !";
            }

            // modifier status enclos
            elseif ($action === 'edit_status') {
                $enclosure_id = $_POST['enclosure_id'];
                $status = $_POST['status'];

                $stmt = $pdo->prepare("UPDATE enclosures SET status = :status WHERE enclosure_id = :enclosure_id");
                $stmt->execute([
                    'enclosure_id' => $enclosure_id,
                    'status' => $status]);
                $message = "Etat de l'enclos modifié avec succès !";
            }

            // ajouter horaire de repas
            elseif ($action === 'add_horaire') {
                $enclosure_id = $_POST['enclosure_id'];
                $horaire = $_POST['horaire'];

                $stmt = $pdo->prepare("INSERT INTO schedules (enclosure_id, feeding_time) VALUES (:enclosure_id, :horaire)");
                $stmt->execute([
                    'enclosure_id' => $enclosure_id,
                    'horaire' => $horaire]);
                $message = "Horaire de repas ajouté avec succès !";
            }

            // ajouter un animal dans un enclos
            elseif ($action === 'add_animal') {
                $enclosure_id = $_POST['enclosure_id'];
                $name = $_POST['name'];
                $age = $_POST['age'];
                $species = $_POST['species'];

                $stmt = $pdo->prepare("INSERT INTO animals (name, species, age, enclosure_id) VALUES (:name, :species, :age, :enclosure_id)");
                $stmt->execute([
                    'name' => $name,
                    'species' => $species,
                    'age' => $age,
                    'enclosure_id' => $enclosure_id]);
                $message = "Animal ajouté avec succès !";
            } 

            // supprimer un commentaire
            elseif ($action === 'delete_review') {
                $review_id = $_POST['review_id'];

                $stmt = $pdo->prepare("DELETE FROM reviews WHERE review_id = :review_id");
                $stmt->execute(['review_id' => $review_id]);
                $message = "Commentaire supprimé avec succès !";
            }

        }

        echo "<hr />";
        echo "<p>$message</p>";
        echo "<hr />";

        // formulaire user
        echo '    
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
            </form>';

        echo '
            <h2>Modifier un utilisateur</h2>
            <form method="POST">
                <input type="hidden" name="action" value="edit">

                <label for="user_id">ID de l\'utilisateur :</label>
                <input type="number" name="user_id" required><br>

                <label for="email">Email :</label>
                <input type="email" name="email" required><br>

                <label for="role">Rôle :</label>
                <select name="role" required>
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select><br>

                <button type="submit">Modifier</button>
            </form>';

        echo '
            <h2>Supprimer un utilisateur</h2>
            <form method="POST">
                <input type="hidden" name="action" value="delete">

                <label for="user_id">ID de l\'utilisateur :</label>
                <input type="number" name="user_id" required><br>

                <button type="submit">Supprimer</button>
            </form>';

        echo "<hr />";

        echo '
            <h2>Modifier horaire de repas enclos</h2>
            <form method="POST">
                <input type="hidden" name="action" value="edit_horaire">

                <label for="sched_id">ID de l\'horaire :</label>
                <input type="number" name="sched_id" required><br>

                <label for="horaire">Horaire de repas :</label>
                <input type="time" name="horaire" required><br>

                <button type="submit">Modifier</button>
            </form>';

        echo '
            <h2>Ajouter un horaire de repas</h2>
            <form method="POST">
                <input type="hidden" name="action" value="add_horaire">

                <label for="enclosure_id">ID de l\'enclos :</label>
                <input type="number" name="enclosure_id" required><br>

                <label for="horaire">Horaire de repas</label>
                <input type="time" name="horaire" required><br>

                <button type="submit">Ajouter</button>
            </form>';

        echo '
            <h2>Modifier status enclos</h2>
            <form method="POST">
                <input type="hidden" name="action" value="edit_status">

                <label for="enclosure_id">ID de l\'enclos :</label>
                <input type="number" name="enclosure_id" required><br>

                <label for="status">Status :</label>
                <select name="status" required>
                    <option value="open">Ouvert</option>
                    <option value="closed">Fermé</option>
                </select><br>

                <button type="submit">Modifier</button>
            </form>';

        echo "<hr />";

        // formulaire animaux
        echo '    
            <h2>Déplacer un animal</h2>
            <form method="POST">
                <input type="hidden" name="action" value="move_animal">

                <label for="animal_id">ID de l\'animal :</label>
                <input type="number" name="animal_id" required><br>

                <label for="enclosure_id">ID de l\'enclos :</label>
                <input type="number" name="enclosure_id" required><br>

                <button type="submit">Déplacer</button>
            </form>';

        echo '
            <h2>Ajouter un animal</h2>
            <form method="POST">
                <input type="hidden" name="action" value="add_animal">

                <label for="name">Nom de l\'animal :</label>
                <input type="text" name="name" required><br>

                <label for="species">Espèce :</label>
                <input type="text" name="species" required><br>

                <label for="age">Âge de l\'animal :</label>
                <input type="number" name="age" required><br>

                <label for="enclosure_id">ID de l\'enclos :</label>
                <input type="number" name="enclosure_id" required><br>

                <button type="submit">Ajouter</button>
            </form>';

        echo "<hr />";

        echo '
            <h2>Supprimer un commentaire</h2>
            <form method="POST">
                <input type="hidden" name="action" value="delete_review">

                <label for="review_id">ID du commentaire :</label>
                <input type="number" name="review_id" required><br>

                <button type="submit">Supprimer</button>
            </form>';
    }

} else {
    // Sinon, afficher un message ou rediriger vers une page de connexion
    echo '<p>Veuillez vous connecter pour accéder à ce formulaire.</p>';
}

echo "<hr />";
echo '<a href="Projet.html">Retourner à l\'accueil.</a>';

?>


<style>
    hr {
      border: none;
      border-top: 3px double #333;
      color: #333;
      overflow: visible;
      text-align: center;
      height: 5px;
    }

    hr::after {
      background: #fff;
      content: '§';
      padding: 0 4px;
      position: relative;
      top: -13px;
    }
</style>

</body>
</html>
