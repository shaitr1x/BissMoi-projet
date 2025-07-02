<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="icon" href="<?= BASE_URL ?>assets/images/favicon.ico" type="image/png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>//assets/css/commercant/gestionproduit.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/public/modern-ui.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
/* ✅ Overlay pour l’image agrandie */
.lightbox {
  display: none;
  position: fixed;
  z-index: 9999;
  top: 0; left: 0;
  width: 100%; height: 100%;
  background: rgba(0, 0, 0, 0.8);
  justify-content: center;
  align-items: center;
}

.lightbox img {
  max-width: 90%;
  max-height: 90%;
  border: 4px solid white;
  border-radius: 8px;
}

.lightbox.active {
  display: flex;
}
</style>

</head>
<!-- header -->
<?php include 'views/includes/header_commercant.php'; ?><br><br><br><br>
<body>
  <div class="container">
    <h1>📦 Gestion des Produits</h1>

    <div class="add-product">
      <a href="index.php?controller=product&action=add">➕ Ajouter un produit</a>
    </div>

    <table class="product-table">
      <thead>
        <tr>
          <th>Image</th>
          <th>Nom</th>
          <th>Description</th>
          <th>Prix</th>
          <th>Stock</th>
          <th>Catégorie</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php if (!empty($produits)) : ?>
          <?php foreach ($produits as $p) : ?>
            <tr>
<?php
$images = json_decode($p['image'], true);
?>
<td>
  <?php if (!empty($images)) : ?>
    <?php foreach ($images as $img) : ?>
      <img src="/BissMoi/<?= htmlspecialchars($img) ?>" alt="Produit"
           width="70" style="margin: 5px; cursor:pointer; border-radius: 4px;"
           onclick="openLightbox(this.src)">
    <?php endforeach; ?>
  <?php else : ?>
    Pas d'image
  <?php endif; ?>
</td>


              <td><?= htmlspecialchars($p['nom']) ?></td>
              <td><?= htmlspecialchars($p['description']) ?></td>
              <td><?= number_format($p['prix'], 2) ?> TND</td>
              <td><?= (int)$p['quantite_stock'] ?></td>
              <td><?= htmlspecialchars($p['categorie']) ?></td>
              <td class="actions">
                <a href="index.php?controller=product&action=edit&id=<?= $p['id_produit'] ?>"><button>✏️ Modifier</button></a>
                <a href="index.php?controller=product&action=delete&id=<?= $p['id_produit'] ?>" onclick="return confirm('Supprimer ce produit ?');"><button style="background-color: var(--couleur-erreur); color: white;">🗑️ Supprimer</button></a>
              </td>
            </tr>
          <?php endforeach; ?>
        <?php else : ?>
          <tr>
            <td colspan="7" style="text-align:center;">Aucun produit pour le moment.</td>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
  <!-- Lightbox -->
<div class="lightbox" id="lightbox" onclick="closeLightbox()">
  <img src="" alt="Agrandie">
</div>

<script>
function openLightbox(src) {
  const lightbox = document.getElementById('lightbox');
  lightbox.classList.add('active');
  lightbox.querySelector('img').src = src;
}

function closeLightbox() {
  document.getElementById('lightbox').classList.remove('active');
}
</script>

</body>
</html>