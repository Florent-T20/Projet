<h2>Recherche d'animaux</h2>

<form action="" method="post">
    <label for="animal">Espèce de l'animal</label>
    <input type="text" id="animal" name="animal" required>
    <br><br>
    <input type="submit" value="Rechercher animal">
</form>

<?php
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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['animal'])) {
        $animal = $_POST['animal'];

        // Recherche des animaux, ID des enclos, noms des enclos et noms des biomes
        $stmt = $pdo->prepare("
            SELECT 
                animals.animal_id, animals.name, animals.species,
                enclosures.enclosure_id AS enclosure_id, 
                enclosures.name AS enclosure_name,
                biomes.name AS biome_name,
                biomes.color_code AS biome_color
            FROM animals
            LEFT JOIN enclosures ON animals.enclosure_id = enclosures.enclosure_id
            LEFT JOIN biomes ON enclosures.biome_id = biomes.biome_id
            WHERE animals.species LIKE :animal
        ");
        $stmt->execute(['animal' => '%' . $animal . '%']);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC); // Récupère toutes les lignes

        if ($results) {
            // Affichage des données
            echo "<h3>Résultats de la recherche :</h3>";

            foreach ($results as $index => $row) {
                echo "<table border='1' style='border-collapse: collapse; width: 50%; text-align: left;'>";
                echo "<tr><th>Champ</th><th>Valeur</th></tr>";

                foreach ($row as $key => $value) {
                    // Affichage séparé des champs spécifiques
                    if ($key === 'enclosure_id') {
                        echo "<tr><td>ID de l'enclos</td>";
                        echo "<td>" . htmlspecialchars($value ?? 'Non défini', ENT_QUOTES, 'UTF-8') . "</td></tr>";
                        continue;
                    }

                    if ($key === 'enclosure_name') {
                        echo "<tr><td>Nom de l'enclos</td>";
                        echo "<td>" . htmlspecialchars($value ?? 'Non défini', ENT_QUOTES, 'UTF-8') . "</td></tr>";
                        continue;
                    }

                    if ($key === 'biome_name') {
                        // Appliquer la couleur du biome si disponible
                        $color = $row['biome_color'] ?? '#FFFFFF';
                        echo "<tr><td>Biome</td>";
                        echo "<td style='background-color: " . htmlspecialchars($color, ENT_QUOTES, 'UTF-8') . "; color: #000;'>";
                        echo htmlspecialchars($value ?? 'Non défini', ENT_QUOTES, 'UTF-8') . "</td></tr>";
                        continue;
                    }

                    // Afficher les autres champs
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($key) . "</td>";
                    echo "<td>" . htmlspecialchars($value ?? '', ENT_QUOTES, 'UTF-8') . "</td>";
                    echo "</tr>";
                }

                echo "</table>";
            }
        } else {
            // Message si aucun résultat trouvé
            $message = "Aucun animal trouvé avec le nom '" . htmlspecialchars($animal) . "'.";
        }
    }
}

if ($message) {
    echo "<p style='color: red; font-weight: bold;'>" . $message . "</p>";
}
?>

<!-- feuille de style locale pour l'affichage des animaux -->
<style>
    body {
        background-color: #212529;
        color: #dee2e6;
    }

    table {
        border: 1px solid #ccc;
        border-collapse: collapse;
        margin-top: 20px;
        width: 50%;
    }

    th, td {
        border: 1px solid #ccc;
        padding: 8px;
        text-align: left;
    }

    th {
        background-color: #212500;
    }
</style>
