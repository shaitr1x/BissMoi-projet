<?php
$images = json_decode($produit['image'], true);
$main   = $images[0] ?? 'assets/images/default.jpg';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title><?= htmlspecialchars($produit['nom']) ?> – BissMoi</title>
 <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/product.css">
   <link id="theme-link" rel="stylesheet" href="<?= BASE_URL ?>//assets/css/dark.css">
  <!-- Icônes Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

  <header>
        <?php if (session_status() === PHP_SESSION_NONE) {
    session_start();
}?>
    <div class="logo">BissMoi</div>
    <div class="search-bar">
     <form action="recherche.php" method="GET">
    <input type="text" name="q" placeholder="Rechercher un produit...">
    <button type="submit"><i class="fas fa-search"></i></button>
    </form>
    </div>
    <div class="user-actions">
      <a href="index.php?controller=user&action=logout">Se déconnecter</a>
      <a href="index.php?controller=user&action=updaterole" >devenir commercant</a>
  <img src="https://cdn-icons-png.flaticon.com/512/1144/1144760.png" alt="User Icon" class="user-icon">
  
     <span class="user-name">
     <?php echo $_SESSION['user']['name']; ?>
      </span>   
      <?php
$cartCount = isset($_SESSION['panier']) ? array_sum(array_column($_SESSION['panier'], 'qty')) : 0;
?>
<a href="index.php?controller=cart&action=view" style="position: relative;">
  <i class="fas fa-shopping-cart"></i> Panier
  <?php if ($cartCount > 0): ?>
    <span class="cart-count"><?= $cartCount ?></span>
  <?php endif; ?>
</a>

    </div>
  </header>

<section class="product-details">
  <div class="img-box">
    <img src="<?= $main ?>" alt="<?= htmlspecialchars($produit['nom']) ?>">
  </div>

  <div class="info-box">
    <h1><?= htmlspecialchars($produit['nom']) ?></h1>
    <p class="price"><?= number_format($produit['prix'],2) ?> TND</p>
    <p><?= nl2br(htmlspecialchars($produit['description'])) ?></p>

    <form action="index.php?controller=cart&action=add" method="post">
      <input type="hidden" name="id_produit" value="<?= $produit['id_produit'] ?>">
      <label>Quantité :</label>
      <input type="number" name="qty" value="1" min="1" style="width:80px">
      <button type="submit">Ajouter au panier 🛒</button>
    </form>
  </div>
</section>

</body>
</html>
