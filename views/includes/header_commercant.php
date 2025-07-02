<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$cartCount = isset($_SESSION['panier'])
    ? array_sum(array_column($_SESSION['panier'], 'qty'))
    : 0;
?>
<link rel="stylesheet" href="<?= BASE_URL ?>assets/css/public/modern-ui.css">
<header class="main-header" role="banner" aria-label="En-tête commerçant">
  <a href="index.php?controller=commercant&action=dashboard" class="logo" aria-label="Accueil commerçant">🛒 BissMoi</a>
  <form class="search-bar" action="recherche.php" method="GET" role="search" aria-label="Recherche de produits">
    <input type="text" name="q" placeholder="Rechercher un produit..." aria-label="Rechercher un produit">
    <button type="submit" aria-label="Lancer la recherche"><i class="fas fa-search"></i></button>
  </form>
  <nav class="user-actions" aria-label="Actions commerçant">
    <div class="user-info" tabindex="0" aria-label="Profil commerçant">
      <i class="fas fa-user-circle" aria-hidden="true"></i>
      <span class="user-name"><?= htmlspecialchars($_SESSION['user']['name']) ?></span>
    </div>
    <a href="index.php?controller=user&action=logout" title="Déconnexion" class="icon-link" aria-label="Déconnexion">
      <i class="fas fa-sign-out-alt" aria-hidden="true"></i>
    </a>
  </nav>
</header>


