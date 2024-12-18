<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Calcul d'itinéraire</title>
</head>
<body>
    <h1>Recherche d'itinéraire :D</h1>

    <form action="" method="post">
        <label for="depart">Départ :</label>
        <input type="text" id="depart" name="depart" required>
        <br>
        <label for="arrivee">Arrivée :</label>
        <input type="text" id="arrivee" name="arrivee" required>
        <br><br>
        <input type="submit" value="Calculer le Chemin">
    </form>

    <?php
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $depart = escapeshellarg($_POST["depart"]);
        $arrivee = escapeshellarg($_POST["arrivee"]);
        
        // script Python avec les arguments utilisateur
        $commande = "C:\Users\mathy\AppData\Local\Programs\Python\Python313\python.exe .\dijkstra.py $depart $arrivee 2>&1";
        $output = shell_exec($commande);

        if (strpos($output, 'non trouv') === false) {
            echo "<h2>Résultat :</h2>";
            echo "<img src='output/chemin_personnalise.jpg' alt='Chemin Calculé' width='1200' length='630'>";
        } else {
            echo "<h2>Chemin non trouvé :(</h2>";
        }
    }

    ?>

<p><a href="../Projet.html">Retour</a></p>

</body>
</html>
