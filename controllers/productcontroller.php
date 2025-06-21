<?php
require_once __DIR__ . '/../models/product.php';
class productcontroller {
    //appel des vues

    public static function dashboardclient()
    {
        require_once __DIR__ . '/../views/client/dashbordclient.php';
    }

    //add product
    
public static function add() {
        if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_commercant = $_SESSION['user']['id'];
    $nom = $_POST['nom'] ?? '';
    $description = $_POST['description'] ?? '';
    $prix = $_POST['prix'] ?? '';
    $stock = $_POST['stock'] ?? '';
    $categorie = $_POST['categorie'] ?? '';

    $imagePaths = []; // Tableau qui contiendra les chemins des images enregistrées

    $allowed = ['jpg', 'jpeg', 'png', 'gif'];
    $uploadDir = 'uploads/';

    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    if (!empty($_FILES['images']['name'][0])) {
        $filesCount = count($_FILES['images']['name']);

        if ($filesCount > 5) {
            echo "Vous ne pouvez pas télécharger plus de 5 images.";
            return;
        }

        for ($i = 0; $i < $filesCount; $i++) {
            $fileTmp  = $_FILES['images']['tmp_name'][$i];
            $fileName = basename($_FILES['images']['name'][$i]);
            $fileExt  = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

            if (in_array($fileExt, $allowed)) {
                $uniqueName = uniqid('img_', true) . '.' . $fileExt;
                $targetPath = $uploadDir . $uniqueName;

                if (move_uploaded_file($fileTmp, $targetPath)) {
                    $imagePaths[] = $targetPath;
                }
            }
        }
    }

    // 👉 Ici tu peux choisir d'enregistrer le premier ou tous les chemins (ex. JSON)
    $imageString = json_encode($imagePaths); // Enregistre comme texte JSON
    // Si tu préfères uniquement la première :
    // $imageString = $imagePaths[0] ?? '';

    $produit = new Produit($id_commercant, $nom, $description, $prix, $stock, $imageString, $categorie);
    if ($produit->add()) {
        header('Location: index.php?controller=user&action=gestionproduit');
        exit;
    } else {
        echo "Erreur lors de l'ajout du produit.";
    }
    } else {
        require_once __DIR__ . '/../views/commercant/addproduct.php';
    }
}

//liste produit

public static function list()
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    $id_commercant = $_SESSION['user']['id'] ?? null;
    if (!$id_commercant) {
        header('Location: index.php?controller=user&action=login');
        exit;
    }

    $produits = Produit::getAllByMerchant($id_commercant);
    require __DIR__ . '/../views/commercant/gestion_de_produit.php';
}

//supprimer un produit
public static function delete() {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $produit = new Produit();
        $success = $produit->delete($id);
        if ($success) {
            header('Location: index.php?controller=user&action=gestionproduit');
            exit;
        } else {
            echo "Erreur lors de la suppression.";
        }
    } else {
        echo "ID produit non fourni.";
    }
}

//editer un produit
public static function edit() {
        if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    $id=$_GET['id'];
    $produit = Produit::getById($id);

if (!$produit) {
    echo "Produit non trouvé pour l'ID : " . htmlspecialchars($id);
    exit;
}
   if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'] ?? '';
    $description = $_POST['description'] ?? '';
    $prix = $_POST['prix'] ?? '';
    $stock = $_POST['stock'] ?? '';
    $categorie = $_POST['categorie'] ?? '';
    
    $imagePaths = [];
    $allowed = ['jpg', 'jpeg', 'png', 'gif','webp'];
    $uploadDir = 'uploads/';

    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    if (!empty($_FILES['images']['name'][0])) {
        $filesCount = count($_FILES['images']['name']);

        if ($filesCount > 5) {
            echo "Vous ne pouvez pas télécharger plus de 5 images.";
            return;
        }

        for ($i = 0; $i < $filesCount; $i++) {
            $fileTmp  = $_FILES['images']['tmp_name'][$i];
            $fileName = basename($_FILES['images']['name'][$i]);
            $fileExt  = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

            if (in_array($fileExt, $allowed)) {
                $uniqueName = uniqid('img_', true) . '.' . $fileExt;
                $targetPath = $uploadDir . $uniqueName;

                if (move_uploaded_file($fileTmp, $targetPath)) {
                    $imagePaths[] = $targetPath;
                }
            }
        }

        $imageJson = json_encode($imagePaths);
    } else {
        // Pas de nouvelles images → conserver les anciennes
        $imageJson = $produit['image'];
    }

    $produitObj = new Produit();
    $success = $produitObj->update($id, $nom, $description, $prix, $stock, $imageJson, $categorie);

    if ($success) {
        header('Location: index.php?controller=user&action=gestionproduit');
        exit;
    } else {
        echo "Erreur lors de la modification.";
    }
} else {
        // Affichage du formulaire avec données actuelles
        $produit = Produit::getById($id);
        require_once __DIR__ . '/../views/commercant/editproduct.php';
    }
}

//plus d'infos sur le produit
public static function show() {
    $id = $_GET['id'] ?? null;
    if (!$id) { echo "ID produit manquant"; return; }

    $produit = Produit::getById($id); 
    if (!$produit) { echo "Produit introuvable"; return; }

    require __DIR__ . '/../views/client/product_details.php';
}

}