<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>BissMoi - Accueil</title>
  <link id="theme-link" rel="stylesheet" href="<?= BASE_URL ?>//assets/css/dark.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
   <!-- En-tête -->
  <header>
    <div class="logo">BissMoi</div>
    <div class="search-bar">
     <form action="recherche.php" method="GET">
    <input type="text" name="q" placeholder="Rechercher un produit...">
    <button type="submit"><i class="fas fa-search"></i></button>
    </form>
    </div>
    <div class="user-actions">
      <a href="index.php?controller=user&action=login" >Connexion</a><a href="index.php?controller=user&action=register">Inscription</a>
      <a href="#"><i class="fas fa-shopping-cart"></i> Panier</a>
    </div>
  </header>
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
      <img src="assets/images/maison.jpg" alt="Maison">
      <h3>Maison & Cuisine</h3>
    </div>
    <!-- Ajoute d'autres catégories ici -->
  </div>
</section>


  <!-- Produits en vedette -->
  <section class="featured-products">
    <h2>Produits populaires</h2>
      <div class="product-grid">
  <?php if (!empty($produitsPopulaires)) : ?>
    <?php foreach ($produitsPopulaires as $p) : 
      $images = json_decode($p['image'], true);
      $imgSrc = !empty($images[0]) ? $images[0] : 'assets/images/default.jpg'; ?>
      
      <div class="product-card">
        <img src="<?= $imgSrc ?>" alt="<?= htmlspecialchars($p['nom']) ?>">
        <h3><?= htmlspecialchars($p['nom']) ?></h3>
        <p>Prix : <?= htmlspecialchars($p['prix']) ?> TND</p>
        <button>Ajouter au panier</button>
      </div>

    <?php endforeach; ?>
  <?php else : ?>
    <p>Aucun produit trouvé.</p>
  <?php endif; ?>
</div>
      <!-- Répéter pour d'autres produits -->
    </div>
  </section>

  <!-- Pied de page -->
  <footer>
    <p>&copy; 2025 BissMoi. Tous droits réservés.</p>
  </footer>
</body>
</html>
