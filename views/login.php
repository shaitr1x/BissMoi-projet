<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>//assets/css/public/register.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/public/modern-ui.css">
</head>
<body>
  <div class="login-container">
    <form method="post" action="index.php?controller=user&action=login" autocomplete="on">
      <h3>Connexion</h3>
      <?php if (!empty($error)) : ?>
        <div class="error"><?= htmlspecialchars($error) ?></div>
      <?php endif; ?>
      <?php if (isset($message) && $message): ?>
        <p class="error-message"><?= htmlspecialchars($message) ?></p>
      <?php endif; ?>
      <label for="email">Adresse mail</label>
      <input type="email" id="email" name="email" placeholder="Votre email" required autofocus>
      <label for="password">Mot de passe</label>
      <input type="password" id="password" name="password" placeholder="Mot de passe" required>
      <button type="submit">Se connecter</button>
      <div style="text-align:center;margin-top:1rem;">
        <a href="index.php?controller=user&action=register" style="color:#00b894;text-decoration:underline;">Créer un compte</a>
      </div>
    </form>
  </div>
</body>
</html>