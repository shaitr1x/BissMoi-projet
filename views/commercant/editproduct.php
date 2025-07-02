<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Modifier un Produit</title>
  <link rel="icon" href="<?= BASE_URL ?>assets/images/favicon.ico" type="image/png">
  <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/public/modern-ui.css">
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      padding: 2rem;
    }

    .form-container {
      background-color: white;
      max-width: 600px;
      margin: auto;
      padding: 2rem;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }

    h2 {
      color: #FF9900;
      margin-bottom: 1rem;
    }

    label {
      display: block;
      margin-top: 1rem;
    }

    input, select, textarea {
      width: 100%;
      padding: 0.5rem;
      margin-top: 0.3rem;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    button {
      margin-top: 1.5rem;
      padding: 10px 20px;
      background-color: #FF9900;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    img {
      margin-top: 1rem;
      max-width: 150px;
    }
  </style>
</head>
<body>

<div class="form-container">
  <h2>✏️ Modifier le produit</h2>

  <form action="index.php?controller=product&action=edit&id=<?= $produit['id_produit'] ?>" method="post" enctype="multipart/form-data">
    <label for="nom">Nom du produit</label>
    <input type="text" name="nom" value="<?= htmlspecialchars($produit['nom']) ?>" required>

    <label for="prix">Prix (TND)</label>
    <input type="number" name="prix" step="0.01" value="<?= htmlspecialchars($produit['prix']) ?>" required>

    <label for="stock">Stock disponible</label>
    <input type="number" name="stock" value="<?= htmlspecialchars($produit['quantite_stock']) ?>" required>

    <label for="categorie">Catégorie</label>
    <select name="categorie" required>
      <option value="">-- Sélectionner --</option>
      <option value="Électronique" <?= $produit['categorie'] === 'Électronique' ? 'selected' : '' ?>>Électronique</option>
      <option value="Mode" <?= $produit['categorie'] === 'Mode' ? 'selected' : '' ?>>Mode</option>
      <option value="Maison & Cuisine" <?= $produit['categorie'] === 'Maison & Cuisine' ? 'selected' : '' ?>>Maison & Cuisine</option>
    </select>

    <label for="description">Description</label>
    <textarea name="description" rows="4" required><?= htmlspecialchars($produit['description']) ?></textarea>

     <label>Images existantes :</label><br>
  <?php
    $images = json_decode($produit['image'], true);
    if (!empty($images)) {
        foreach ($images as $img) {
            echo "<img src=\"$img\" width=\"80\" style=\"margin:5px;\">";
        }
    } else {
        echo "Aucune image";
    }
  ?>

  <br><label>Remplacer les images :</label>
  <input type="file" name="images[]" multiple accept="image/*">

  <button type="submit">Mettre à jour</button>
</form>
</div>

</body>
</html>
