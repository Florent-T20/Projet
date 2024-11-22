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

        // Recherche des animaux et noms des enclos
        $stmt = $pdo->prepare("
            SELECT animals.*, enclosures.name AS enclosure_name
            FROM animals
            LEFT JOIN enclosures ON animals.enclosure_id = enclosures.enclosure_id
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

                    // Ne pas afficher la colonne "enclosure_name", elle est déjà traitée
                    if ($key === 'enclosure_name') {
                        continue;
                    }

                    // Remplacement de "enclosure_id" par "Nom de l'enclos"
                    if ($key === 'enclosure_id') {
                        $key = 'Nom de l\'enclos';
                        $value = $row['enclosure_name'] ?? 'Non défini'; // Si pas de nom d'enclos, afficher "Non défini"
                    }

                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($key) . "</td>";
                    // opérateur null coalescent
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
	    background-color: #f4f4f4;
	}

	p {
	    font-size: 1.1em;
	}

</style>
