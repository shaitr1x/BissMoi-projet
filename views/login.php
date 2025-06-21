<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>//assets/css/register.css">
</head>
<body>
  <div class="login-container">
    <form method="post" action="index.php?controller=user&action=login">
      <h3>Connexion</h3>

      <?php if (isset($message) && $message): ?>
        <p class="error-message"><?= htmlspecialchars($message) ?></p>
      <?php endif; ?>

      <label for="email">addresse mail</label>
      <input type="email" id="email" name="email" placeholder="email" required>

      <label for="password">Mot de passe</label>
      <input type="password" id="password" name="password" placeholder="Mot de passe" required>

      <button type="submit">Se connecter</button>
    </form>
  </div>
</body>


</html>

