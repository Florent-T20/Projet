<?php
/*
Ne pas toucher
*/

session_start();

function isGuest() {
    return isset($_SESSION['role']) && $_SESSION['role'] === 'guest';
}

function isUser() {
    return isset($_SESSION['role']) && $_SESSION['role'] === 'user';
}

function isAdmin() {
    return isset($_SESSION['role']) && $_SESSION['role'] === 'admin';
}

// Vérification de l'accès (recharger la page actuelle, celle générée par le serveur)
if (isAdmin()) {
    echo "Bienvenue, administrateur.";
} elseif (isUser()) {
    echo "Bienvenue, utilisateur.";
} else {
    echo "Vous êtes un invité. Certaines fonctionnalités sont limitées.";
}
echo "<br />";

?>
