<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <link rel="icon" href="<?= BASE_URL ?>assets/images/favicon.ico" type="image/png">
  <meta charset="UTF-8">
  <title>Mon Panier - BissMoi</title>
  <link rel="stylesheet" href="<?= BASE_URL ?>//assets/css/dark.css">
  <style>
    .cart-container {
      max-width: 1000px;
      margin: 2rem auto;
      background-color: var(--couleur-primaire);
      padding: 2rem;
      border-radius: 8px;
    }

    .cart-title {
      text-align: center;
      font-size: 2rem;
      color: var(--couleur-titres);
      margin-bottom: 1.5rem;
    }

    .cart-item {
      display: flex;
      align-items: center;
      justify-content: space-between;
      background-color: var(--couleur-secondaire);
      padding: 1rem;
      margin-bottom: 1rem;
      border-radius: 6px;
    }

    .cart-item img {
      width: 80px;
      height: 80px;
      object-fit: cover;
      border-radius: 6px;
    }

    .item-info {
      flex: 1;
      margin-left: 1rem;
    }

    .item-info h3 {
      margin-bottom: 0.5rem;
    }

    .item-price {
      font-weight: bold;
      color: var(--couleur-accent);
    }

    .remove-btn {
      background-color: var(--couleur-erreur);
      border: none;
      color: white;
      padding: 0.4rem 0.8rem;
      border-radius: 4px;
      cursor: pointer;
    }

    .cart-summary {
      text-align: right;
      margin-top: 2rem;
    }

    .total {
      font-size: 1.2rem;
      font-weight: bold;
      color: var(--couleur-accent);
    }

    .checkout-btn {
      background-color: var(--couleur-bouton-fond);
      color: var(--couleur-bouton-texte);
      padding: 0.7rem 1.2rem;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      margin-top: 1rem;
      font-weight: bold;
    }

    .checkout-btn:hover {
      background-color: var(--couleur-bouton-hover);
    }
  </style>
</head>
<body>

  <header>
    <div class="logo">🛒 BissMoi</div>
    <div class="user-actions">
      <span class="user-name">Bonjour, <?= $_SESSION['user']['name'] ?? 'Visiteur' ?></span>
      <a href="index.php?controller=user&action=logout">Déconnexion</a>
    </div>
  </header>

  <div class="cart-container">
    <div class="cart-title">🛍️ Votre Panier</div>

    <!-- Exemple d'article -->
    <div class="cart-item">
      <img src="https://source.unsplash.com/100x100/?product" alt="Produit">
      <div class="item-info">
        <h3>Nom du produit</h3>
        <div class="item-price">49.99 TND</div>
      </div>
      <button class="remove-btn">❌ Retirer</button>
    </div>

    <!-- Répéter pour chaque produit -->

    <div class="cart-summary">
      <p class="total">Total : 149.97 TND</p>
      <button class="checkout-btn">✅ Valider la commande</button>
    </div>
  </div>

  <footer>
    <p>&copy; <?= date("Y") ?> BissMoi - Tous droits réservés</p>
  </footer>

</body>
</html>
