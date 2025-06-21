<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>//assets/css/register.css">
</head>
<body>
    <form action="index.php?controller=user&action=register" method="post">
        <h3>Créer un compte</h3>
        <h4>Tous les champs sont obligatoires</h4>

        <label for="name">Votre nom</label>
        <input type="text" name="name" id="name" placeholder="Nom et prénom" required>

        <label for="email">E-mail</label>
        <input type="email" name="email" id="email" placeholder="Votre e-mail" required>

        <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password" placeholder="Au moins six caractères" required>

        <input type="submit" value="S'inscrire">
    </form>

    <script src="../assets/js/theme.js"></script>
</body>
</html>
