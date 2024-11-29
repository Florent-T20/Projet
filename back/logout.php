<?php

session_start();
session_destroy(); // Détruit la session

header("Location: ../Projet.html"); // Redirige vers la page principale
exit;

?>
