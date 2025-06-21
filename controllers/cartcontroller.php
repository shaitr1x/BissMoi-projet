<?php
class CartController {

    public static function add() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $id = $_POST['id_produit'];
        $qty = $_POST['qty'] ?? 1;

        // Initialiser le panier
        if (!isset($_SESSION['panier'])) {
            $_SESSION['panier'] = [];
        }

        // Ajouter ou incrémenter
        if (isset($_SESSION['panier'][$id])) {
            $_SESSION['panier'][$id]['qty'] += $qty;
        } else {
            $_SESSION['panier'][$id] = ['id' => $id, 'qty' => $qty];
        }

        // Redirection vers la fiche produit
        header("Location: index.php?controller=product&action=show&id=" . $id);
        exit;
    }
}

