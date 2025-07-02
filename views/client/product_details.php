<?php
$images = json_decode($produit['image'], true);
$main   = $images[0] ?? 'assets/images/default.jpg';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= htmlspecialchars($produit['nom']) ?> – BissMoi</title>
  <link id="theme-link" rel="stylesheet" href="<?= BASE_URL ?>//assets/css/public/dark.css">
  <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/commercant/product.css">
  <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/public/modern-ui.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
   <?php include __DIR__ . '/../includes/header_client.php'; ?>
<section class="product-details responsive-container">
  <div class="img-box">
    <img src="<?= $main ?>" alt="<?= htmlspecialchars($produit['nom']) ?>">
  </div>
  <div class="info-box modern-box">
    <h1><?= htmlspecialchars($produit['nom']) ?></h1>
    <p class="price"><?= number_format($produit['prix'],2) ?> TND</p>
    <p><?= nl2br(htmlspecialchars($produit['description'])) ?></p>
    <form action="index.php?controller=cart&action=add" method="post">
      <input type="hidden" name="id_produit" value="<?= $_GET["id"] ?>">
      <label>Quantité :</label>
      <input type="number" name="qty" value="1" min="1" style="width:80px">
      <button type="submit" class="modern-btn primary">Ajouter au panier 🛒</button>
    </form>
  </div>
</section>
<?php include __DIR__ . '/../includes/footer.php'; ?>
</body>
</html>
