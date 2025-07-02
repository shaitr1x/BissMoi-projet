<?php
require_once __DIR__ . '/../models/product.php';
require_once __DIR__ . '/../models/user.php';
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
    public static function view() {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    $produit = [];
    $total = 0;

    if (!empty($_SESSION['panier'])) {
        foreach ($_SESSION['panier'] as $id => $item) {
            $p = Produit::getById($item['id']);  

            if ($p) {
                $p['qty'] = $item['qty'];
                $p['total'] = $p['prix'] * $item['qty'];
                $produit[] = $p;
                $total += $p['total'];
            }
        }
    }

    require_once __DIR__ . '/../views/client/panier.php';
}

public static function dropcard() {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    if (isset($_GET['id']) && isset($_SESSION['panier'][$_GET['id']])) {
        unset($_SESSION['panier'][$_GET['id']]);
    }

    // Optionnel : redirige vers la page panier après suppression
    header("Location: index.php?controller=cart&action=view");
    exit;
}


}
