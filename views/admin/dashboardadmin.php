<?php if (session_status() === PHP_SESSION_NONE) {
    session_start();
}?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <link rel="icon" href="<?= BASE_URL ?>assets/images/favicon.ico" type="image/png">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard Admin - BissMoi</title>
  <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/public/modern-ui.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
  <?php include __DIR__ . '/../includes/header_acceuil.php'; ?>
  <section class="hero">
    <h1>Tableau de bord Administrateur</h1>
    <p>Gérez les utilisateurs, commerçants, produits et l'activité de la plateforme.</p>
  </section>
  <nav class="main-nav">
    <a href="#">👥 Utilisateurs</a>
    <a href="#">🛒 Produits</a>
    <a href="#">🛍️ Commerçants</a>
    <a href="#">📊 Statistiques</a>
    <a href="#">⚙️ Paramètres</a>
  </nav>
  <section class="categories-section">
    <h2>Vue d'ensemble</h2>
    <div class="categories-grid">
      <div class="category-card">
        <img src="assets/images/team.png" alt="Utilisateurs">
        <h3>Utilisateurs</h3>
        <p>+350 utilisateurs inscrits</p>
      </div>
      <div class="category-card">
        <img src="assets/images/store.png" alt="Commerçants">
        <h3>Commerçants</h3>
        <p>+85 comptes actifs</p>
      </div>
      <div class="category-card">
        <img src="assets/images/product.png" alt="Produits">
        <h3>Produits</h3>
        <p>+1200 produits listés</p>
      </div>
    </div>
  </section>
  <section class="featured-products">
    <h2>Dernières actions</h2>
    <div class="product-grid">
      <div class="product-card">
        <h3>Nouvelle inscription</h3>
        <p>L'utilisateur <strong>Sarah K.</strong> a rejoint la plateforme</p>
      </div>
      <div class="product-card">
        <h3>Produit signalé</h3>
        <p>Produit <strong>"Casque JBL Pro"</strong> marqué comme non conforme</p>
      </div>
      <div class="product-card">
        <h3>Commerçant validé</h3>
        <p>Le compte de <strong>TechTunisie</strong> est désormais commerçant</p>
      </div>
    </div>
  </section>
  <?php include __DIR__ . '/../includes/footer.php'; ?>
</body>
</html>
