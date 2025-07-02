<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$cartCount = isset($_SESSION['panier'])
    ? array_sum(array_column($_SESSION['panier'], 'qty'))
    : 0;
?>
<link rel="stylesheet" href="<?= BASE_URL ?>assets/css/public/modern-ui.css">
<header class="main-header" role="banner" aria-label="En-tête principal">
  <!-- Logo -->
  <a href="index.php" class="logo" aria-label="Accueil BissMoi">BissMoi</a>

  <!-- Barre de recherche -->
  <form class="search-bar" action="recherche.php" method="GET" role="search" aria-label="Recherche de produits">
    <input type="text" name="q" placeholder="Rechercher un produit..." aria-label="Rechercher un produit">
    <button type="submit" aria-label="Lancer la recherche"><i class="fas fa-search"></i></button>
  </form>

  <!-- Actions utilisateur -->
  <nav class="user-actions" aria-label="Actions utilisateur">
    <a href="index.php?controller=user&action=logout" title="Déconnexion" class="icon-link" aria-label="Déconnexion">
      <i class="fas fa-sign-out-alt" aria-hidden="true"></i>
    </a>
    <a href="index.php?controller=user&action=updaterole" class="text-link" aria-label="Devenir commerçant">Devenir commerçant</a>
    <div class="user-info" tabindex="0" aria-label="Profil utilisateur">
      <i class="fas fa-user-circle" aria-hidden="true"></i>
      <span class="user-name"><?= htmlspecialchars($_SESSION['user']['name']) ?></span>
    </div>
    <a href="index.php?controller=cart&action=view" class="cart-link" title="Voir le panier" aria-label="Voir le panier">
      <i class="fas fa-shopping-cart" aria-hidden="true"></i>
      <?php if ($cartCount > 0): ?>
        <span class="cart-count" aria-label="Nombre d'articles dans le panier"><?= $cartCount ?></span>
      <?php endif; ?>
    </a>
  </nav>
</header>


