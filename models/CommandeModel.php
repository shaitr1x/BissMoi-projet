<?php
require_once __DIR__ . '/../config/database.php';
class CommandeModel
{
    private $db;

    public function creerCommande($idClient, $telephone, $livraison, $adresse)
    {

        $con = connexion::connect();
        $stmt = $con->prepare("INSERT INTO commandes (id_client, total) VALUES (?, 0)");
        $stmt->execute([$idClient]);
        $idCommande = $this->db->lastInsertId();

        if ($livraison === 'domicile') {
            $stmt = $this->db->prepare("INSERT INTO addresses (user_id, phone, address_line1) VALUES (?, ?, ?)");
            $stmt->execute([$idClient, $telephone, $adresse]);
        }

        return $idCommande;
    }

    public function ajouterProduitCommande($idCommande, $idProduit, $quantite, $prix)
    {
        $stmt = $this->db->prepare("INSERT INTO details_commande (id_commande, id_produit, quantite, prix) VALUES (?, ?, ?, ?)");
        $stmt->execute([$idCommande, $idProduit, $quantite, $prix]);
    }
}
