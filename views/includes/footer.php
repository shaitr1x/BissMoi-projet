<link rel="stylesheet" href="<?= BASE_URL ?>assets/css/public/modern-ui.css">
<footer role="contentinfo" aria-label="Pied de page principal">
  <div class="footer-content">
    <p>&copy; <?= date("Y") ?> BissMoi. Tous droits réservés.</p>
    <nav class="footer-nav" aria-label="Liens pied de page">
      <a href="index.php" aria-label="Accueil">Accueil</a>
      <a href="index.php?controller=user&action=login" aria-label="Connexion">Connexion</a>
      <a href="index.php?controller=user&action=register" aria-label="Inscription">Inscription</a>
      <a href="index.php?controller=client&action=dashboard" aria-label="Espace client">Espace client</a>
      <a href="index.php?controller=commercant&action=dashboard" aria-label="Espace commerçant">Espace commerçant</a>
    </nav>
  </div>
</footer>
