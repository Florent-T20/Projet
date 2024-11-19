<?php
/*
FICHIER TEMPORAIRE
*/

session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    http_response_code(403);
    die("Accès refusé.");
}
?>