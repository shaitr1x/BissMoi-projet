<?php
        if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
$userId = $_SESSION['user']['id'] ?? '';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <link rel="icon" href="<?= BASE_URL ?>assets/images/favicon.ico" type="image/png">
  <meta charset="UTF-8">
  <title>Devenir Commerçant - BissMoi</title>
  <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/public/modern-ui.css">
  <style>
    body {
      font-family: Arial, sans-serif;
      background: linear-gradient(120deg, #232526 0%, #414345 100%);
      padding: 2rem;
      min-height: 100vh;
      color: #fff;
    }
    .policy-container {
      background: #232323;
      border-left: 6px solid #098c6e
      padding: 2.5rem 2rem;
      margin: 2rem auto;
      max-width: 600px;
      border-radius: 12px;
      box-shadow: 0 4px 24px 0 rgba(0,0,0,0.12);
      position: relative;
    }
    h2 {
      color: #098c6e;
      margin-bottom: 1.2rem;
      font-size: 2rem;
      text-align: center;
    }
    .policy-container p,
    .policy-container li {
      margin-bottom: 0.75rem;
      font-size: 1.08rem;
    }
    .policy-container ol {
      margin-left: 1.5rem;
      padding-left: 0.5rem;
    }
    .checkbox-area {
      text-align: center;
      margin-top: 2.2rem;
    }
    .checkbox-area label {
      font-size: 1.1rem;
      cursor: pointer;
    }
    button {
      padding: 12px 32px;
      background: linear-gradient(90deg, #098c6e 60%, #098c6e 100%);
      color: #fff;
      border: none;
      border-radius: 6px;
      font-size: 1.1rem;
      font-weight: bold;
      margin-top: 1.2rem;
      cursor: not-allowed;
      opacity: 0.5;
      transition: opacity 0.2s, box-shadow 0.2s;
      box-shadow: 0 2px 8px 0 rgba(255,153,0,0.08);
    }
    button.enabled {
      cursor: pointer;
      opacity: 1;
      box-shadow: 0 4px 16px 0 rgba(255,153,0,0.18);
    }
    .success-message {
      display: none;
      background: #1e7e34;
      color: #fff;
      border-radius: 6px;
      padding: 1.2rem 1rem;
      margin: 1.5rem auto 0 auto;
      max-width: 500px;
      text-align: center;
      font-size: 1.15rem;
      box-shadow: 0 2px 12px 0 rgba(30,126,52,0.12);
    }
    .success-message.visible {
      display: block;
      animation: fadeIn 0.7s;
    }
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to   { opacity: 1; transform: translateY(0); }
    }
  </style>
</head>
<body>
  <form id="devenirComForm" action="index.php?controller=user&action=updaterole" method="post">
    <input type="hidden" name="user_id" value="<?= htmlspecialchars($userId) ?>">
    <div class="policy-container">
      <h2><i class="fas fa-store"></i> Politique d’engagement du commerçant BissMoi</h2>
      <p>En demandant à devenir commerçant sur BissMoi, vous acceptez de respecter les engagements suivants :</p>
      <ol>
        <li><strong>Authenticité des produits</strong><br>Vous garantissez que les produits mis en vente sont légaux, non contrefaits, et respectent les lois en vigueur.<br>Vous vous engagez à ne pas publier d'annonces trompeuses ou mensongères.</li>
        <li><strong>Qualité de service</strong><br>Vous vous engagez à traiter les commandes dans les délais, à assurer un service client respectueux et à gérer les retours conformément à la législation.<br>Les délais de livraison, les prix et les stocks doivent être clairement indiqués et à jour.</li>
        <li><strong>Respect de la plateforme</strong><br>Vous vous interdisez tout comportement frauduleux ou usage abusif de la plateforme.<br>Vous ne devez pas contourner les règles de BissMoi (paiements hors site, échanges de coordonnées non autorisés...).</li>
        <li><strong>Protection des données</strong><br>Vous respecterez la confidentialité des données des clients et ne les utiliserez que dans le cadre des ventes effectuées via BissMoi.</li>
        <li><strong>Respect légal</strong><br>Vous vous conformez aux obligations fiscales, commerciales et légales liées à votre activité de vente.</li>
      </ol>
      <div class="checkbox-area">
        <label>
          <input type="checkbox" id="acceptCheckbox">
          J’ai lu et j’accepte la Politique du Commerçant de BissMoi.
        </label><br>
        <button id="submitBtn" disabled type="submit">Continuer</button>
      </div>
    </div>
  </form>
  <div id="successMsg" class="success-message">
    <i class="fas fa-check-circle"></i> Félicitations, vous êtes désormais commerçant sur BissMoi !<br>
    Redirection vers votre espace commerçant...
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js" crossorigin="anonymous"></script>
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
