<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>//assets/css/public/register.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/public/modern-ui.css">
</head>
<body>
  <form action="index.php?controller=user&action=register" method="post" autocomplete="on">
    <h3>Créer un compte</h3>
    <h4>Tous les champs sont obligatoires</h4>
    <label for="name">Votre nom</label>
    <input type="text" name="name" id="name" placeholder="Nom et prénom" required autofocus>
    <label for="email">E-mail</label>
    <input type="email" name="email" id="email" placeholder="Votre e-mail" required>
    <label for="password">Mot de passe</label>
    <input type="password" name="password" id="password" placeholder="Au moins six caractères" required>
    <input type="submit" value="S'inscrire">
    <div style="text-align:center;margin-top:1rem;">
      <a href="index.php?controller=user&action=login" style="color:#00b894;text-decoration:underline;">Déjà un compte ? Se connecter</a>
    </div>
  </form>
</body>
</html>
