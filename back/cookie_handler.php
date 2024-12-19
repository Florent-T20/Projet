<?php
// Vérifier si l'ID de l'enclos est envoyé via POST
if (isset($_POST['enclos_id'])) {
    $enclos_id = intval($_POST['enclos_id']);

    // Créer un cookie valable jusqu'à la fin de la session
    setcookie('enclos_id', $enclos_id, 0, "/"); // 0 signifie expiration à la fermeture du navigateur

    // Redirection vers la page des avis
    header("Location: ../avis.html");
    exit();
} else {
    echo "Erreur : aucun enclos sélectionné.";
}
?>
