<?php
session_start();
require_once('back/access.php');

if (isUser() || isAdmin()) {
  if (isset($_GET['product_id']) && isset($_GET['quantity'])) {
    $product_id = $_GET['product_id'];
    $quantity = $_GET['quantity'];
    $user_id = $_SESSION['user_id'];

    try {
      // Mettre à jour la quantité dans le panier
      $stmt = $pdo->prepare("UPDATE panier SET quantite = :quantity WHERE produit_id = :product_id AND user_id = :user_id");
      $stmt->execute([':quantity' => $quantity, ':product_id' => $product_id, ':user_id' => $user_id]);

      echo json_encode(['success' => true]);
    } catch (PDOException $e) {
      echo json_encode(['success' => false, 'message' => $e->getMessage()]);
    }
  }
}
?>
