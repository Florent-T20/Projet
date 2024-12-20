<?php

// session lancée
// vérifie aussi s'il existe déjà une session
require_once('access.php');

// si qqun s'est connecté, alors on ne peut plus se connecter/s'enregistrer : on est redirigé vers la page d'accueil
if (isAdmin() || isUser()) {
    header("location: Projet.html");
    exit;
}

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

// Gestion du formulaire de login ou d'enregistrement
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['login'])) {
        // Traitement du login
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        // Recherche de l'utilisateur dans la base de données
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->execute(['username' => $username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            // Stockage des informations dans la session
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role']; // 'user' ou 'admin'
            $message = "Connexion réussie. Bienvenue, " . htmlspecialchars($user['username']) . "!";
        } else {
            $message = "Erreur : Nom d'utilisateur ou mot de passe incorrect.";
        }

    } elseif (isset($_POST['register'])) {
        // Traitement de l'enregistrement
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Validation des données
        if (filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($username) && !empty($password)) {
            // Hachage du mot de passe
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Insertion dans la base de données
            $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
            try {
                $stmt->execute([
                    'username' => $username,
                    'email' => $email,
                    'password' => $hashedPassword
                ]);
                $message = "Inscription réussie. Vous pouvez maintenant vous connecter.";
            } catch (PDOException $e) {
                if ($e->getCode() == 23000) {
                    $message = "Erreur : L'email ou le nom d'utilisateur est déjà utilisé.";
                } else {
                    $message = "Erreur lors de l'inscription : " . $e->getMessage();
                }
            }
        } else {
            $message = "Erreur : Veuillez entrer des informations valides.";
        }
    }
}

if (!empty($message)):
    echo htmlspecialchars($message);
    echo "<br><a href='../Projet.html'>Retourner à la page d'accueil</a>";
endif;

?>
