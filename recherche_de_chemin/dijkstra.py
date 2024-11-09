from PIL import Image, ImageDraw
from time import sleep
import heapq
import re
import math


def calculate_distance(coord1, coord2):
    return math.sqrt((coord2[0] - coord1[0]) ** 2 + (coord2[1] - coord1[1]) ** 2)


distance_matrix = {}
node_info = {}
node_coords = {}


with open('données_carte.txt', 'r', encoding='utf-8') as file:
    lines = file.readlines()
    
    for line in lines:
        parts = line.strip().split(" - ")
        node_id = int(parts[0].split(" : ")[0].strip())
        
        coords_match = re.search(r"\((\d+),\s*(\d+)\)", parts[0])
        x, y = int(coords_match.group(1)), int(coords_match.group(2))
        node_coords[node_id] = (x, y)
        
        description = parts[1].strip()
        
        neighbors_match = re.search(r"\[(.*?)\]", parts[2])
        neighbors = [int(n.strip()) for n in neighbors_match.group(1).split(',')]
        
        node_info[node_id] = description
        distance_matrix[node_id] = []

        for neighbor in neighbors:
            distance_matrix[node_id].append((neighbor, None))


for node_id, neighbors in distance_matrix.items():
    for i, (neighbor, _) in enumerate(neighbors):
        if neighbor in node_coords:
            distance = calculate_distance(node_coords[node_id], node_coords[neighbor])
            distance_matrix[node_id][i] = (neighbor, distance)


def dijkstra(graph, start):
    n = len(graph)
    distances = []
    for i in range(n):
        distances.append(float('inf'))

    distances[start-1] = 0  
    previous_nodes = []
    for i in range(n):
        previous_nodes.append(None)
    
    priority_queue = [(0, start)]

    while priority_queue:
        current_distance, current_node = heapq.heappop(priority_queue)

        if current_distance > distances[current_node-1]:
            continue

        for neighbor, weight in graph[current_node-1]:
            distance = current_distance + weight

            if distance < distances[neighbor-1]:
                distances[neighbor-1] = distance
                previous_nodes[neighbor-1] = current_node
                heapq.heappush(priority_queue, (distance, neighbor))

    return distances, previous_nodes



def draw_shortest_path(image_path, output_path, coords, path):
    image = Image.open(image_path)
    draw = ImageDraw.Draw(image)
    
    for i in range(len(path) - 1):
        x1, y1 = coords[path[i]]
        x2, y2 = coords[path[i + 1]]
        draw.line((x1, y1, x2, y2), fill="blue", width=3)
    
    image.save(output_path)
    image.show()


image_path = "carte.jpg"
image = Image.open(image_path)
draw = ImageDraw.Draw(image)

for node, neighbors in distance_matrix.items():
    x1, y1 = node_coords[node]
    for neighbor, _ in neighbors:
        x2, y2 = node_coords[neighbor]
        draw.line((x1, y1, x2, y2), fill="red", width=2)

output_path = "output/tout_voisin_carte.jpg"
image.save(output_path)
image.show()

matrix = list(distance_matrix.values())
dist = []
for row in matrix:
    dist.append(row)

(result, routes) = dijkstra(dist, 1)

chemin = []
node = 50  # noeud d'arrivée
while node != 1:  # 1 est le nœud de départ
    chemin.append(node)
    node = routes[node-1]
chemin.append(1)
chemin.reverse()

draw_shortest_path(image_path, "output/chemin_n1_vers_n_carte.jpg", node_coords, chemin)
