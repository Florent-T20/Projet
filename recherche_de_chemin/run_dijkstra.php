<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $depart = escapeshellarg($_POST["depart"]);
    $arrivee = escapeshellarg($_POST["arrivee"]);
    
    // Exécutez le script Python avec les arguments utilisateur
    $commande = "C:\Users\mathy\AppData\Local\Programs\Python\Python313\python.exe .\dijkstra.py $depart $arrivee 2>&1";
    $output = shell_exec($commande);

    echo "<p>Commande exécutée : $commande</p>";
    echo "<pre>$output</pre>";  // Affiche la sortie ou les erreurs

    echo "<h2>Résultat :</h2>";
    echo "<p>Chemin calculé. Consultez l'image ci-dessous.</p>";
    echo "<img src='output/chemin_personnalise.jpg' alt='Chemin Calculé'>";
}
?>
