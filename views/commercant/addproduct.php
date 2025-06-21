<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Ajouter un Produit</title>
  <link rel="stylesheet" href="<?= BASE_URL ?>//assets/css/add.css">
</head>
<body>
  <div class="form-container">
    <h2>Ajouter un produit</h2>
    <form action="index.php?controller=product&action=add" method="post" enctype="multipart/form-data">
      <label for="nom">Nom du produit</label>
      <input type="text" name="nom" required>

      <label for="price">Prix (TND)</label>
      <input type="number" name="prix" step="0.01" required>

      <label for="stock">Stock disponible</label>
      <input type="number" name="stock" required>

      <label for="categorie">Catégorie</label>
      <select name="categorie" required>
        <option value="">-- Sélectionner --</option>
        <option value="Électronique">Électronique</option>
        <option value="Mode">Mode</option>
        <option value="Maison & Cuisine">Maison & Cuisine</option>
        <!-- Tu peux ajouter d’autres catégories dynamiquement -->
      </select>

      <label for="description">Description</label>
      <textarea name="description" rows="4" required></textarea>

      <label for="image">Image</label>
<div class="circle-upload-wrapper">
  <label for="images" class="circle-upload">
    <span class="icon">+</span>
    <input type="file" id="images" name="images[]" accept="image/*" multiple hidden required>
  </label>
  <small class="upload-note">(Max 5 images)</small>
  <div id="file-count"></div>
</div>


      <button type="submit">Enregistrer</button>
    </form>
  </div>
</body>
</html>
