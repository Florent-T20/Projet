<?php

session_set_cookie_params([
    'secure' => true,    // Transmet uniquement le cookie sur HTTPS
    'httponly' => true,  // Interdit l'accès au cookie via JavaScript
    'samesite' => 'Strict' // Empêche les envois depuis des sites tiers
]);

session_start();

// Gestion des utilisateurs non connectés
if (!isset($_SESSION['user_id'])) {
    $_SESSION['role'] = 'guest'; // Par défaut : invité
}


function isUser() {
    return isset($_SESSION['role']) && $_SESSION['role'] === 'user';
}

function isAdmin() {
    return isset($_SESSION['role']) && $_SESSION['role'] === 'admin';
}


?>
