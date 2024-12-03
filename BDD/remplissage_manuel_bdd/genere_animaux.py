import random

# dictionnaire biome: animaux
dictionnaire_biome = {"Le Plateau": ["Varan de Komodo", "Eléphant", "Girafe", "Grivet cercopithèque", "Hyène", "Loup à crinière", "Zèbre", "Hippopotame", "Lion", "Ouistiti", "Tamarin", "Capucin", "Gibbon"],
					  "Le Vallon des cascades": ["Panthère", "Ara perroquet", "Grand hocco", "Panda roux", "Lémurien", "Chèvre naine", "Tortue", "Mouflon", "Binturong", "Loutre"],
					  "Le Bois des pins": ["Vautour", "Macaque crabier", "Cerf", "Daim", "Antilope", "Nilgaut", "Loup d'Europe"],
					  "Les Clairières": ["Marabout", "Cigogne", "Oryx algazelle", "Watusi", "Ibis", "Tortue", "Pécari", "Âne de Somalie", "Yack", "Lynx", "Serval", "Chien des buissons", "Tigre", "Tamanoir", "Nandou", "Flamant rose", "Mouton noir", "Emeu", "Wallaby", "Porc-épic"],
					  "Le Belvédère": ["Rhinocéros", "Oryx beisa", "Gnou", "Autruche", "Fennec", "Suricate", "Coati", "Saïmiri", "Tapir", "Casoar", "Gazelle", "Guépard", "Crocodile nain"]}

# dictionnaire faisaint le lien entre les différents animaux présents dans un même enclos
meme_enclos = {"Le Bois des pins": [["Daim", "Antilope", "Nilgaut"]],
			   "Le Vallon des cascades": [["Loutre", "Binturong"], ["Chèvre naine", "Tortue"]],
			   "Les Clairières": [["Yack", "Mouton noir"], ["Oryx algazelle", "Watusi", "Âne de Somalie"], ["Wallaby", "Emeu"], ["Flamant rose", "Tamanoir", "Nandou"], ["Ibis", "Tortue"]],
			   "Le Plateau": [[""]]}
liste_espece = []

# remplissage liste espece
for _, value in dictionnaire_biome.items():
	for i in range(len(value)):
		liste_espece.append(value[i])

# Ouvrir le fichier en mode lecture
with open('noms.txt', 'r', encoding='utf-8') as fichier:
    # Lire le contenu du fichier ligne par ligne, enlever les espaces et stocker dans la liste
    noms_aleatoire = [ligne.strip() for ligne in fichier]


# Fonction pour échapper les apostrophes dans une chaîne SQL
def echapper_apostrophes(texte):
    return texte.replace("'", "''")

# Fonction pour générer les requêtes SQL
def generer_requetes(prenoms, biomes_animaux):
    requetes = []
    enclos_id = 1  # Initialise l'enclos à 1
    
    for biome, animaux in biomes_animaux.items():
        for espece in animaux:
            # Nombre d'animaux pour l'enclos, entre 2 et 6
            nb_animaux_enclos = random.randint(2, 6)
            
            # Choisir des prénoms pour les animaux dans cet enclos
            animaux_enclos = random.sample(prenoms, min(nb_animaux_enclos, len(prenoms)))
            
            for prenom in animaux_enclos:
                age = random.randint(1, 20)
                
                # Échapper les apostrophes dans les valeurs de texte
                prenom_sql = echapper_apostrophes(prenom)
                espece_sql = echapper_apostrophes(espece)
                biome_sql = echapper_apostrophes(biome)
                
                # Requête SQL pour chaque animal dans le même enclos et de la même espèce
                requete = f"INSERT INTO `animaux` (`Id`, `Nom`, `Espèce`, `Age`, `Enclos`, `Biome`) VALUES (NULL, '{prenom_sql}', '{espece_sql}', '{age}', '{enclos_id}', '{biome_sql}');"
                requetes.append(requete)
                
            
            # Incrémenter l'enclos pour la prochaine espèce
            enclos_id += 1
    
    return requetes

# Appel de la fonction et affichage des requêtes générées
"""
requetes_sql = generer_requetes(noms_aleatoire, dictionnaire_biome)
for requete in requetes_sql:
    print(requete)
"""

print(f"Nombre d'animaux : {len(liste_espece)}")
