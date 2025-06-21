<?php
        if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
$userId = $_SESSION['user']['id'] ?? '';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Devenir Commerçant - BissMoi</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #171616;;
      padding: 2rem;
      line-height: 1.6;
      color:#FFFFFF;
    }

    .policy-container {
      background-color: #615C5C;
      border-left: 5px solid #FF9900;
      padding: 2rem;
      margin: auto;
      max-width: 800px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0,0,0,0.05);
    }

    h2 {
      color: #FF9900;
      margin-bottom: 1rem;
    }

    .policy-container p,
    .policy-container li {
      margin-bottom: 0.75rem;
    }

    .policy-container ol {
      margin-left: 1.5rem;
      padding-left: 0.5rem;
    }

    .checkbox-area {
      text-align: center;
      margin-top: 2rem;
    }

    button {
      padding: 10px 20px;
      background-color: #FF9900;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: not-allowed;
      opacity: 0.5;
      margin-top: 1rem;
    }

    button.enabled {
      cursor: pointer;
      opacity: 1;
    }
  </style>
</head>
<body>
  <form action="index.php?controller=user&action=updaterole" method="post">
  <input type="hidden" name="user_id" value="<?= htmlspecialchars($userId) ?>">

  <div class="policy-container">
    <h2> Politique d’engagement du commerçant BissMoi</h2>
    <p>En demandant à devenir commerçant sur BissMoi, vous acceptez de respecter les engagements suivants :</p>

    <ol>
      <li>
        <strong>Authenticité des produits</strong><br>
        Vous garantissez que les produits mis en vente sont légaux, non contrefaits, et respectent les lois en vigueur.<br>
        Vous vous engagez à ne pas publier d'annonces trompeuses ou mensongères.
      </li>

      <li>
        <strong>Qualité de service</strong><br>
        Vous vous engagez à traiter les commandes dans les délais, à assurer un service client respectueux et à gérer les retours conformément à la législation.<br>
        Les délais de livraison, les prix et les stocks doivent être clairement indiqués et à jour.
      </li>

      <li>
        <strong>Respect de la plateforme</strong><br>
        Vous vous interdisez tout comportement frauduleux ou usage abusif de la plateforme.<br>
        Vous ne devez pas contourner les règles de BissMoi (paiements hors site, échanges de coordonnées non autorisés...).
      </li>

      <li>
        <strong>Protection des données</strong><br>
        Vous respecterez la confidentialité des données des clients et ne les utiliserez que dans le cadre des ventes effectuées via BissMoi.
      </li>

      <li>
        <strong>Respect légal</strong><br>
        Vous vous conformez aux obligations fiscales, commerciales et légales liées à votre activité de vente.
      </li>
    </ol>

        <div class="checkbox-area">
      <label>
        <input type="checkbox" id="acceptCheckbox">
        J’ai lu et j’accepte la Politique du Commerçant de BissMoi.
      </label><br>
      <button id="submitBtn" disabled type="submite">Continuer</button>
    </div>
  </div>
</form>

<script>
  const checkbox = document.getElementById('acceptCheckbox');
  const button   = document.getElementById('submitBtn');

  checkbox.addEventListener('change', () => {
    button.disabled = !checkbox.checked;
    button.classList.toggle('enabled', checkbox.checked);
  });
</script>

</body>
</html>
