<?php

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

// Récupérer les avis de la base de données
try {
    $stmt = $pdo->query("SELECT r.review_id, r.rating, r.comment, r.created_at, u.username, e.name 
                         FROM reviews r
                         LEFT JOIN users u ON r.user_id = u.user_id
                         LEFT JOIN enclosures e ON r.enclosure_id = e.enclosure_id
                         ORDER BY r.created_at DESC");

    $reviews = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Erreur lors de la récupération des avis : " . $e->getMessage());
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Avis</title>
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
        .rating {
            color: gold;
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
                <th>Utilisateur</th>
                <th>Enclos</th>
                <th>Note</th>
                <th>Commentaire</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($reviews)) : ?>
                <tr>
                    <td colspan="5">Aucun avis disponible pour le moment.</td>
                </tr>
            <?php else : ?>
                <?php foreach ($reviews as $review) : ?>
                    <tr>
                        <td><?= htmlspecialchars($review['username'] ?? 'Anonyme') ?></td>
                        <td><?= htmlspecialchars($review['name'] ?? 'Non spécifié') ?></td>
                        <td class="rating">
                            <?= str_repeat('★', $review['rating']) ?>
                            <?= str_repeat('☆', 5 - $review['rating']) ?>
                        </td>
                        <td><?= nl2br(htmlspecialchars($review['comment'])) ?></td>
                        <td><?= htmlspecialchars($review['created_at']) ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
