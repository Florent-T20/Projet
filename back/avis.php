<!DOCTYPE html>
<html>
<head>
    <title>temporaire</title>
</head>
<body>
    <p>prout</p>

<?php
/*
1. Planification du Système
    - Objectif : Permettre aux utilisateurs de laisser des commentaires associés à un élément spécifique (un produit de la boutique +, un enclos ou un service, voire sur le zoo en général (page d'accueil)).
    - Fonctionnalités principales :
        - Ajouter un commentaire avec une note/5.
        - Lier chaque commentaire à un utilisateur et un élément spécifique.
        - Afficher les commentaires pour un élément donné.
        - Valider les entrées utilisateur pour éviter les erreurs et sécuriser les données.


2. Créer un formulaire pour soumettre des commentaires
    - Concevoir un formulaire HTML avec :
        - Un champ texte pour le commentaire.
        - Un champ pour une note (si applicable).
        - Un champ pour l'identifiant utilisateur (obtenu via une session de connexion si votre site a un système de connexion).
        - Un champ caché ou un moyen de transmettre l'identifiant de l'élément (par exemple, enclosure_id).

    - Ajouter des validations côté client avec JavaScript (pour des messages d'erreur instantanés) ??


3. Connexion au serveur PHP et base de données
    - Configurer un fichier PHP pour établir une connexion à votre base de données via PDO (plus sécurisé).
    - Vérifier si la connexion réussit, sinon, affichez un message d'erreur pour le débogage.


3. Traiter les données soumises par le formulaire
    - Vérifier si le formulaire a été soumis via la méthode POST.
    - Récupérer et valider les données utilisateur :
        - S'assurer que la note est entre 1 et 5.
        - Vérifier que le commentaire n’est pas vide.
        - S'assurer que les identifiants (user_id et enclosure_id) sont valides.
    - Préparer une requête SQL pour insérer les données dans la table des commentaires.
    - Exécuter la requête tout en protégeant vos données contre les injections SQL (via des requêtes préparées).


4. Afficher les commentaires pour un élément
    - Identifier l'élément dont les commentaires doivent être affichés (par exemple, en récupérant l'enclosure_id dans l'URL via $_GET).
    - Faire une requête SQL pour extraire tous les commentaires associés à cet élément, en triant par date de création (les plus récents en premier).
    - Afficher les résultats :
        - Note (si applicable).
        - Texte du commentaire.
        - Nom de l'utilisateur ayant laissé le commentaire (mettre Admin en rouge ou guest si non connecté).
        - Date de publication (à récupérer dans la table).


5. Améliorer l’expérience utilisateur BONUS
    - Pagination : Si le nombre de commentaires est élevé, implémenter un système de pagination pour limiter le nombre de commentaires affichés par page.
    - Validation côté client : Ajouter des vérifications avec JavaScript pour une meilleure expérience utilisateur (par exemple, vérifier que la note est entre 1 et 5 sans attendre que le formulaire soit soumis).
    - Retours visuels : Afficher des messages de confirmation ou d’erreur après soumission d’un commentaire.
    - Authentification : Si votre site a un système de connexion, utilisez les sessions pour récupérer l’identifiant de l’utilisateur connecté (user_id).


7. Fonctionnalités avancées BONUS
    - Édition/Suppression des commentaires :
        - Permettre aux utilisateurs de modifier ou de supprimer leurs commentaires.
        - Implémenter des restrictions pour empêcher un utilisateur de modifier les commentaires d’un autre.
    - Système de réponses :
        Ajouter une structure hiérarchique pour permettre les réponses aux commentaires (comme des threads).
    - Notations agrégées :
        - Calculer une moyenne des notes pour l’élément et affichez-la en haut des commentaires.
    - Recherche et filtres :
        - Ajouter une fonctionnalité pour rechercher des commentaires ou filtrer par note (par exemple, afficher uniquement les avis à 5 étoiles).
    - Anti-spam :
        - Implémenter des CAPTCHA pour empêcher les robots de soumettre des commentaires.
        - Ajouter des limites de fréquence pour éviter les abus (exemple : pas plus d’un commentaire par minute).


*/

echo "<h3>Test</h3>";


?>


</body>
</html>
