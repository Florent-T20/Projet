<?php
session_start();
require_once('access.php');

if (isUser() || isAdmin()) {
  if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];
    $user_id = $_SESSION['user_id'];

    try {
      // Supprimer le produit du panier
      $stmt = $pdo->prepare("DELETE FROM panier WHERE produit_id = :product_id AND user_id = :user_id");
      $stmt->execute([':product_id' => $product_id, ':user_id' => $user_id]);

      echo json_encode(['success' => true]);
    } catch (PDOException $e) {
      echo json_encode(['success' => false, 'message' => $e->getMessage()]);
    }
  }
}
?>