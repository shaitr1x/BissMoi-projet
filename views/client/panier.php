<?php  if (session_status() === PHP_SESSION_NONE) {
        session_start();
    } ?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <link rel="icon" href="<?= BASE_URL ?>assets/images/favicon.ico" type="image/png">
  <meta charset="UTF-8">
  <title>Mon Panier - BissMoi</title>
  <link rel="stylesheet" href="<?= BASE_URL ?>//assets/css/public/dark.css">
  <link rel="stylesheet" href="<?= BASE_URL ?>//assets/css/public/panier.css">
  <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/public/modern-ui.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script>
    function toggleAddressField() {
      const typeLivraison = document.getElementById('livraison').value;
      const adresseField = document.getElementById('adresse-container');
      adresseField.style.display = typeLivraison === 'domicile' ? 'block' : 'none';
    }
  </script>
</head>
<body>
<?php include 'views/includes/header_client.php'; ?>
<div class="main-content">
  <div class="cart-box">
    <h2>🛒 Votre Panier</h2>
    <?php if (empty($produit)): ?>
      <p>Votre panier est vide.</p>
    <?php else: ?>
      <?php foreach ($produit as $prod): ?>
  <div class="cart-item">
    <img src="<?= $prod['image'] ? json_decode($prod['image'])[0] : 'default.jpg' ?>" width="80">
    <div style="flex:1;min-width:120px;">
      <strong><?= htmlspecialchars($prod['nom']) ?></strong>
      <div>Prix : <?= number_format($prod['prix'], 2) ?> TND</div>
      <div>Quantité : <?= $prod['qty'] ?></div>
      <div>Sous-total : <?= number_format($prod['total'], 2) ?> TND</div>
    </div>
    <div>
      <?php if (!empty($prod['id_produit'])): ?>
        <form action="index.php?controller=cart&action=dropcard&id=<?= htmlspecialchars($prod['id_produit']) ?>" method="post" style="display:inline;">
          <button type="submit" onclick="return confirm('Supprimer ce produit ?');" style="background-color: var(--couleur-erreur); color: white;">🗑️ Supprimer</button>
        </form>
      <?php else: ?>
        <span style="color: var(--couleur-erreur); font-size:0.9em;">Erreur : ID produit manquant</span>
      <?php endif; ?>
    </div>
  </div>
<?php endforeach; ?>
      <hr>
      <h3>📦 Informations de commande</h3>
      <form action="index.php?controller=cart&action=commander" method="post" id="checkout-form">
        <label for="phone">📱 Numéro de téléphone :</label><br>
        <input type="text" name="phone" id="phone" required><br><br>
        <label for="livraison">🚚 Mode de livraison :</label><br>
        <select name="livraison" id="livraison" required onchange="toggleAdresse()">
          <option value="">-- Choisir --</option>
          <option value="point_retrait">📦 Retrait en point</option>
          <option value="domicile">🏠 Livraison à domicile</option>
        </select><br><br>
        <div id="adresse-block" style="display: none;">
          <label for="adresse">🏠 Adresse de livraison :</label><br>
          <textarea name="adresse" id="adresse" rows="3" placeholder="Ex : 12 Rue de Paris, Tunis"></textarea><br><br>
        </div>
        <button type="submit" class="checkout-btn">✅ Confirmer la commande</button>
      </form>
      <script>
        function toggleAdresse() {
          const type = document.getElementById("livraison").value;
          const block = document.getElementById("adresse-block");
          block.style.display = (type === "domicile") ? "block" : "none";
        }
      </script>
      <p class="total">💰 Total : <?= number_format($total, 2) ?> TND</p>
    <?php endif; ?>
  </div>
  <div class="sidebar">
    <h3>Derniers articles vus</h3>
    <div class="product">
      <img src="https://m.media-amazon.com/images/I/71Y3aJc8ZlL._AC_SY355_.jpg" alt="Produit 1">
      <div class="product-details">
        <h4>Laptop XYZ Pro</h4>
        <div>249,00€ <span>-17%</span></div>
        <button>Ajouter au panier</button>
      </div>
    </div>
    <div class="product">
      <img src="https://m.media-amazon.com/images/I/61CcfzxrYeL._AC_SY355_.jpg" alt="Produit 2">
      <div class="product-details">
        <h4>Playstation 5</h4>
        <div>666,12€</div>
        <button>Ajouter au panier</button>
      </div>
    </div>
  </div>
</div>
<?php include 'views/includes/footer.php'; ?>
</body>
</html>
