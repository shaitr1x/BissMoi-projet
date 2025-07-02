<?php if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
 ?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Dashboard Commerçant - BissMoi</title>
  <link rel="icon" href="<?= BASE_URL ?>assets/images/favicon.ico" type="image/png">
  <link rel="stylesheet" href="<?= BASE_URL ?>//assets/css/public/dark.css"> <!-- ton fichier CSS -->
  <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/public/modern-ui.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

 <?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$user = $_SESSION['user'] ?? null;
$role = $user['role'] ?? 'client';
$name = htmlspecialchars($user['name'] ?? 'Invité');

$cartCount = isset($_SESSION['panier']) ? array_sum(array_column($_SESSION['panier'], 'qty')) : 0;
?>

<header class="main-header">
  <div class="logo">🛍️ BissMoi</div>

  <!-- Barre de recherche -->
  <div class="search-bar">
    <form action="recherche.php" method="GET">
      <input type="text" name="q" placeholder="Rechercher un produit...">
      <button type="submit"><i class="fas fa-search"></i></button>
    </form>
  </div>

  <!-- Actions utilisateur -->
  <div class="user-actions">
    <!-- Utilisateur -->
    <div class="user-info">
      <i class="fas fa-user-circle"></i>
      <span class="user-name"><?= $name ?></span>
    </div>
    <a href="index.php?controller=user&action=logout" title="Déconnexion" class="icon-link">
      <i class="fas fa-sign-out-alt"></i>
    </a>
  </div>
</header>


  <section class="hero">
    <h1>Bienvenue dans votre espace commerçant</h1>
    <p>Gérez vos produits, vos commandes et suivez vos ventes depuis ce tableau de bord.</p>
  </section>

  <nav class="main-nav">
    <a href="index.php?controller=user&action=gestionproduit">📦 Gestion de Produits</a>
    <a href="#">🛒 Commandes</a>
    <a href="#">📈 Statistiques</a>
    <a href="#">⚙️ Paramètres</a>
  </nav>

  <section class="categories-section">
    <h2>Catégories populaires</h2>
    <div class="categories-grid">
      <div class="category-card">
        <img src="https://source.unsplash.com/200x120/?electronics" alt="Électronique">
        <h3>Électronique</h3>
      </div>
      <div class="category-card">
        <img src="https://source.unsplash.com/200x120/?fashion" alt="Mode">
        <h3>Mode</h3>
      </div>
      <div class="category-card">
        <img src="https://source.unsplash.com/200x120/?kitchen" alt="Maison & Cuisine">
        <h3>Maison & Cuisine</h3>
      </div>
    </div>
  </section>

<section class="featured-products">
  <h2>Vos produits en vedette</h2>
  <div class="product-grid">

    <?php if (!empty($produits)) : ?>
      <?php foreach ($produits as $produit) : 
        $images = json_decode($produit['image'], true);
        $image = $images[0] ?? 'https://via.placeholder.com/250x200?text=Aucune+image';
      ?>
        <div class="product-card">
          <img src="<?= $image ?>" alt="<?= htmlspecialchars($produit['nom']) ?>">
          <h3><?= htmlspecialchars($produit['nom']) ?></h3>
          <p><?= number_format($produit['prix'], 2) ?> TND</p>
          <a href="index.php?controller=product&action=edit&id=<?= $produit['id_produit'] ?>">
            <button>Modifier</button>
          </a>
        </div>
      <?php endforeach; ?>
    <?php else : ?>
      <p>Vous n'avez encore ajouté aucun produit.</p>
    <?php endif; ?>

  </div>
</section>


  <footer>
    <p>&copy; <?= date("Y") ?> BissMoi - Tous droits réservés</p>
  </footer>

</body>
</html>
