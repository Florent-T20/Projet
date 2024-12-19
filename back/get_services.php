<?php

$host = 'localhost';
$dbname = 'bdd_temp';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}

// Récupérer les avis de la base de données
try {
    $stmt = $pdo->query("SELECT * FROM services");
    $services = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Erreur lors de la récupération des avis : " . $e->getMessage());
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h2>Liste des Avis</h2>
    <table>
        <thead>
            <tr>
                <th>Numéro de service</th>
                <th>Service</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($services)) : ?>
                <tr>
                    <td colspan="5">Aucun service disponible pour le moment.</td>
                </tr>
            <?php else : ?>
                <?php foreach ($services as $service) : ?>
                    <tr>
                        <td><?= htmlspecialchars($service['service_id']) ?></td>
                        <td><?= $service['name'] ?? 'Non spécifié' ?></td>
                        <td><?= nl2br($service['description']) ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
