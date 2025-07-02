<?php
require_once __DIR__ . '/../config/database.php';

class produit {
    private $id;
    private $id_commercant;
    private $nom;
    private $description;
    private $prix;
    private $stock;
    private $image;
    private $categorie;
    private $date_ajout;

    public function __construct($id_commercant = null, $nom = "", $description = "", $prix = "", $stock = "", $image = "",$categorie="") {
        $this->id_commercant = $id_commercant;
        $this->nom = $nom;
        $this->description = $description;
        $this->prix = $prix;
        $this->stock = $stock;
        $this->image = $image;
        $this->categorie = $categorie;
    }
    
        // --- GETTERS ---
    public function getId() {
        return $this->id;
    }

    public function getIdCommercant() {
        return $this->id_commercant;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getPrix() {
        return $this->prix;
    }

    public function getStock() {
        return $this->stock;
    }

    public function getImage() {
        return $this->image;
    }

    public function getCategorie() {
        return $this->categorie;
    }

    public function getDateAjout() {
        return $this->date_ajout;
    }

    // --- SETTERS ---
    public function setId($id) {$this->id = $id;}

    public function setIdCommercant($id_commercant) {$this->id_commercant = $id_commercant;}

    public function setNom($nom) {$this->nom = $nom;}

    public function setDescription($description) {$this->description = $description;}

    public function setPrix($prix) {$this->prix = $prix;}

    public function setStock($stock) {$this->stock = $stock;}

    public function setImage($image) {$this->image = $image;}

    public function setCategorie($categorie) {$this->categorie = $categorie;}

    public function setDateAjout($date_ajout) {$this->date_ajout = $date_ajout; }

    //add produit

    public function add() {
        $con = connexion::connect();
        $stmt = $con->prepare("INSERT INTO produits (id_commercant, nom, description, prix,quantite_stock, image, categorie)
                               VALUES (:idc, :nom, :desc, :prix, :stock, :image, :cat)");
        return $stmt->execute([
            'idc' => $this->id_commercant,
            'nom' => $this->nom,
            'desc' => $this->description,
            'prix' => $this->prix,
            'stock' => $this->stock,
            'image' => $this->image,
            'cat' => $this->categorie
        ]);
    }

    //lister product 

public static function getAllByMerchant($id_commercant)
{
    $con  = connexion::connect();
    $stmt = $con->prepare(
        "SELECT id_produit, nom, description,
                prix, quantite_stock,
                categorie, image
         FROM produits
         WHERE id_commercant = :idc"
    );
    $stmt->execute(['idc' => $id_commercant]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

//delete product

public function delete($id) {
    $con = connexion::connect();
    $stmt = $con->prepare("DELETE FROM produits WHERE id_produit = :id");
    return $stmt->execute(['id' => $id]);
}

//recupérer un produit avec id
public static function getById($id) {
    $con = connexion::connect();
    $stmt = $con->prepare("SELECT * FROM produits WHERE id_produit = :id");
    $stmt->execute(['id' => $id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

public function update($id, $nom, $description, $prix, $stock, $image, $categorie) {
    $con = connexion::connect();
    $stmt = $con->prepare("UPDATE produits SET nom = :nom, description = :description, prix = :prix, quantite_stock = :stock, image = :image, categorie = :categorie WHERE id_produit = :id");
    return $stmt->execute([
        'nom' => $nom,
        'description' => $description,
        'prix' => $prix,
        'stock' => $stock,
        'image' => $image,
        'categorie' => $categorie,
        'id' => $id
    ]);
}
//produit populaire
public static function getPopular($limit = 5) {
    $con = connexion::connect();
    $sql = "SELECT * FROM produits ORDER BY id_produit DESC LIMIT :limit";
    $stmt = $con->prepare($sql);
    $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

//produit populaire du commercant
public static function getPopularbycommercant($limit, $id) {
    $con = connexion::connect();
    $sql = "SELECT * FROM produits WHERE id_commercant = :id ORDER BY id_produit DESC LIMIT :limit";
    $stmt = $con->prepare($sql);
    
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
    
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}




}