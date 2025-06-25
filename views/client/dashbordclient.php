<!DOCTYPE html>
<html lang="fr">
<head>
  <link rel="icon" href="<?= BASE_URL ?>assets/images/favicon.ico" type="image/png">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>BissMoi - Accueil</title>
  <link id="theme-link" rel="stylesheet" href="<?= BASE_URL ?>//assets/css/dark.css">
  <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/product.css">
  <!-- Icônes Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
   <!-- En-tête -->
    <?php if (session_status() === PHP_SESSION_NONE) {
    session_start();
}?>
<?php include 'views/includes/header_client.php'; ?>
  <!-- Bannière principale -->
  <section class="hero">
    <h1>Bienvenue sur BissMoi</h1>
    <p>Découvrez nos produits phares</p>
  </section>

   <!-- categories -->
<nav class="main-nav">
  <a href="#">Accueil</a>
  <a href="#categories">Catégories</a>
  <a href="#">Boutique</a>
  <a href="#">À propos</a>
  <a href="#">Contact</a>
</nav>
 
<section id="categories" class="categories-section">
  <h2>Nos Catégories</h2>
  <div class="categories-grid">
    <div class="category-card">
      <img src="../assets/images/electronique.png" alt="Électronique">
      <h3>Électronique</h3>
    </div>
    <div class="category-card">
      <img src="../assets/images/mode.png" alt="Mode">
      <h3>Mode</h3>
    </div>
    <div class="category-card">
      <img src="../../assets/images/maison.jpg" alt="Maison">
      <h3>Maison & Cuisine</h3>
    </div>
    <!-- Ajoute d'autres catégories ici -->
  </div>
</section>


  <!-- Produits en vedette -->
  <section class="featured-products">
    <h2>Produits populaires</h2>
<div class="product-grid">
  <?php foreach ($produitsPopulaires as $p) :
        $images = json_decode($p['image'], true);
        $imgSrc = $images[0] ?? 'assets/images/default.jpg';
  ?>
    <a class="product-card" style="text-decoration:none;color:inherit;"
       href="index.php?controller=product&action=show&id=<?= $p['id_produit'] ?>">

      <img src="<?= $imgSrc ?>" alt="<?= htmlspecialchars($p['nom']) ?>">
      <h3><?= htmlspecialchars($p['nom']) ?></h3>
      <p><?= number_format($p['prix'],2) ?> TND</p>
    </a>
  <?php endforeach; ?>
</div>


  </section>

  <!-- Pied de page -->
<?php include 'views/includes/footer.php'; ?>
    <!-- Script JS -->
  <script src="../assets/js/connexion.js"></script>
  <script src="../assets/js/theme.js"></script>

</body>
</html>
