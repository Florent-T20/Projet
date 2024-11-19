<?php

/*
Ne pas toucher, je verrai comment l'insérer lorsque vous aurez fini.
*/

session_start();
session_unset(); // Supprime toutes les variables de session
session_destroy(); // Détruit la session

header("Location: Projet.html"); // Redirige vers la page principale
exit;
?>
