from PIL import Image, ImageDraw
from time import sleep
import heapq
import re
import math

"""
@file main.py
@brief Programme pour lire un fichier de graphes de nœuds et calculer les distances entre nœuds voisins, avec une matrice des distances et un dictionnaire d'informations de nœuds.

Le programme lit un fichier texte contenant des informations sur un graphe de nœuds, avec pour chaque nœud :
- ses coordonnées,
- une description,
- une liste de voisins.
Il calcule les distances entre chaque nœud et ses voisins, puis stocke ces informations dans une matrice sous la forme de tuples `(voisin, distance)`.
Les informations descriptives de chaque nœud sont également stockées dans un dictionnaire.

"""

print("Début programme.")

# Fonction pour calculer la distance euclidienne
def calculate_distance(coord1, coord2):
    """
    @brief Calcule la distance euclidienne entre deux points.
    @param coord1 Tuple contenant les coordonnées (x, y) du premier point.
    @param coord2 Tuple contenant les coordonnées (x, y) du second point.
    @return La distance euclidienne entre les deux points.
    """
    return math.sqrt((coord2[0] - coord1[0]) ** 2 + (coord2[1] - coord1[1]) ** 2)

# Initialiser les structures de données pour stocker les résultats
distance_matrix = {}
node_info = {}
node_coords = {}

# Lire le fichier et extraire les données
with open('données_carte.txt', 'r', encoding='utf-8') as file:
    lines = file.readlines()
    
    for line in lines:
        # Séparer les champs par "-"
        parts = line.strip().split(" - ")
        
        # Extraire le numéro du nœud
        node_id = int(parts[0].split(" : ")[0].strip())
        
        # Extraire les coordonnées du nœud
        coords_match = re.search(r"\((\d+),\s*(\d+)\)", parts[0])
        x, y = int(coords_match.group(1)), int(coords_match.group(2))
        node_coords[node_id] = (x, y)
        
        # Extraire la description du nœud
        description = parts[1].strip()
        
        # Extraire les voisins du nœud
        neighbors_match = re.search(r"\[(.*?)\]", parts[2])
        neighbors = [int(n.strip()) for n in neighbors_match.group(1).split(',')]
        
        # Stocker les informations du nœud dans le dictionnaire
        node_info[node_id] = description
        distance_matrix[node_id] = []

        # Ajouter les voisins à la liste temporairement
        for neighbor in neighbors:
            distance_matrix[node_id].append((neighbor, None))  # Distance initialisée à None

# Calculer les distances pour chaque nœud et ses voisins
for node_id, neighbors in distance_matrix.items():
    for i, (neighbor, _) in enumerate(neighbors):
        # Vérifier que les coordonnées du voisin existent
        if neighbor in node_coords:
            # Calculer la distance entre le nœud actuel et le voisin
            distance = calculate_distance(node_coords[node_id], node_coords[neighbor])
            # Mettre à jour la distance dans la matrice
            distance_matrix[node_id][i] = (neighbor, distance)

"""
# Afficher les résultats
print("Matrice des distances :")
for node, distances in distance_matrix.items():
    print(f"Nœud {node}: {distances}")

print("\nInformations des nœuds :")
for node, info in node_info.items():
    print(f"Nœud {node}: {info}")

print("\nInformations des coordonées des noeuds :")
for node, co in node_coords.items():
    print(f"Noeud {node}: {co}")
"""

############################################################################################

# This function returns a matrix of NxN integers
# They correspond to the lengths of the shortest paths between every pair of nodes
def dijkstra(graph, start):
    # Nombre de nœuds dans le graphe
    n = len(graph)
    #print(f"Taille du graphe : {n}")
    #sleep(1)
    
    # Initialisation des distances et de la liste de précédence
    #print("Initialisation du tableau de distances.")
    distances = []
    for i in range(n):
        distances.append(float('inf'))

    distances[start-1] = 0  # La distance de départ est 0. Les noeuds commençant à 1, il faut décrémenter de 1 les indices
    #print(f"Tableau des distances {distances}")
    #sleep(1)

    #print("Initialisation des nœuds précédents.")
    previous_nodes = []  # Pour suivre le chemin
    for i in range(n):
        previous_nodes.append(None)
    #print(f"Tableau des noeuds précédents : {previous_nodes}")

    priority_queue = [(0, start)]  # Initialiser la file avec le nœud de départ

    while priority_queue:
        current_distance, current_node = heapq.heappop(priority_queue)

        # Vérifier si cette distance est déjà optimale
        # les noeuds commençant à 1, il faut modifier les indices avec current_node
        if current_distance > distances[current_node-1]:
            continue

        # Parcourir les voisins et mettre à jour les distances
        for neighbor, weight in graph[current_node-1]:
            #print(f"Voisin de {current_node} : {neighbor} de poids {weight}")
            #sleep(0.5)
            #print(f"Tableau des distances actuel : {distances}\n")
            #sleep(0.5)
            
            distance = current_distance + weight

            # Mettre à jour la distance seulement si elle est plus courte
            # idem, neighbor est un noeud, donc -1 pour l'indice
            if distance < distances[neighbor-1]:
                distances[neighbor-1] = distance
                previous_nodes[neighbor-1] = current_node
                heapq.heappush(priority_queue, (distance, neighbor))

    return distances, previous_nodes



def draw_shortest_path(image_path, output_path, coords, path):
    """
    @brief Dessine le chemin le plus court entre deux nœuds sur une image.
    @param image_path Chemin de l'image source.
    @param output_path Chemin où l'image modifiée sera sauvegardée.
    @param coords Dictionnaire des coordonnées de chaque nœud.
    @param path Liste des nœuds du chemin le plus court.
    """
    image = Image.open(image_path)
    draw = ImageDraw.Draw(image)
    
    # Tracer les lignes pour chaque segment du chemin
    for i in range(len(path) - 1):
        x1, y1 = coords[path[i]]
        x2, y2 = coords[path[i + 1]]
        draw.line((x1, y1, x2, y2), fill="blue", width=3)
    
    # Sauvegarder l'image avec le chemin dessiné
    image.save(output_path)
    image.show()

    
##############################################################################################

# Test graph
""" 
représenté sous la forme : 
    - graph[i] : noeud i
    - graph[i][0] : couple (voisin, poids)
    - len(graph[i]) : nombre de voisins du noeud i


graph = [
    [(1, 2), (2, 4)],     # Le nœud 0 est connecté à 1 (poids 2) et à 2 (poids 4)
    [(2, 1), (3, 7)],     # Le nœud 1 est connecté à 2 (poids 1) et à 3 (poids 7)
    [(3, 3)],             # Le nœud 2 est connecté à 3 (poids 3)
    []                    # Le nœud 3 n'a pas de voisins
]

start_node = 0
distances, previous_nodes = dijkstra(graph, start_node)

print("Distances depuis le nœud de départ :", distances)
print("Chemins les plus courts :", previous_nodes)
"""
###########################################################################################


# Chargement de l'image et initialisation de l'objet de dessin
print("Début enregistrement.")

image_path = "carte.jpg"
image = Image.open(image_path)
draw = ImageDraw.Draw(image)

# Tracer les lignes entre chaque paire de voisins directs
for node, neighbors in distance_matrix.items():
    x1, y1 = node_coords[node]
    for neighbor, _ in neighbors:
        x2, y2 = node_coords[neighbor]
        draw.line((x1, y1, x2, y2), fill="red", width=2)

# Sauvegarder et afficher l'image avec les lignes tracées
output_path = "output/tout_voisin_carte.jpg"
image.save(output_path)
image.show()

print("Enregistrement de l'image avec tous les noeuds terminé.")


print("Début conversion dictionnaire distance_matrix en matrice.")
# Convertir en matrice (tableau 2D) avec NumPy
# Étape 1 : Extraire les valeurs du dictionnaire (sans ajuster les tailles)
matrix = list(distance_matrix.values())
dist = []
# Étape 2 : Afficher la matrice
for row in matrix:
    dist.append(row)
print("Fin.")

# on applique floyd warshall sur la matrice et on affiche le résultat du pcc de 1 à 45
print("Début algorithme de recherche.")
(result, routes) = dijkstra(dist, 1)
print("Fin.")

chemin = []
node = 50  # noeud d'arrivée
while node != 1:  # 1 est le nœud de départ
    chemin.append(node)
    node = routes[node-1]  # Aller au nœud précédent
chemin.append(1)  # Ajouter le nœud de départ à la fin
chemin.reverse()  # Inverser le chemin pour partir de 1
#print("Chemin final : ", chemin)

print("Affichage.")
draw_shortest_path(image_path, "output/chemin_n1_vers_n_carte.jpg", node_coords, chemin)
print("Fin.")

print("Fin programme.")

