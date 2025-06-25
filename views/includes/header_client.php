<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$cartCount = isset($_SESSION['panier'])
    ? array_sum(array_column($_SESSION['panier'], 'qty'))
    : 0;
?>

<header>
  <!-- Logo -->
  <div class="logo">BissMoi</div>

  <!-- Barre de recherche -->
  <div class="search-bar">
    <form action="recherche.php" method="GET">
      <input type="text" name="q" placeholder="Rechercher un produit...">
      <button type="submit"><i class="fas fa-search"></i></button>
    </form>
  </div>

  <!-- Actions utilisateur -->
  <div class="user-actions">
    <a href="index.php?controller=user&action=logout">Se déconnecter</a>
    <a href="index.php?controller=user&action=updaterole">Devenir commerçant</a>

    <img
      src="https://cdn-icons-png.flaticon.com/512/1144/1144760.png"
      alt="User Icon"
      class="user-icon"
    >

    <span class="user-name">
      <?= htmlspecialchars($_SESSION['user']['name'] ?? '') ?>
    </span>

    <!-- Icône panier + compteur -->
    <a href="index.php?controller=cart&action=view" style="position: relative;">
      <i class="fas fa-shopping-cart"></i> Panier
      <?php if ($cartCount > 0): ?>
        <span class="cart-count"><?= $cartCount ?></span>
      <?php endif; ?>
    </a>
  </div>
</header>

