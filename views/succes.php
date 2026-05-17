<?php
$pageTitle = 'Succès';
require 'views/partials/header.php';
?>

<section>
  <h1>🎉 Paiement confirmé !</h1>
  <p>Bonjour <strong><?= htmlspecialchars($_SESSION['etudiant_prenom'] ?? '') ?></strong> !</p>
  <p>Votre inscription à <strong><?= htmlspecialchars($_SESSION['formation_titre'] ?? '') ?></strong> est confirmée.</p>
  <br>
  <a href="index.php?page=cours">Accéder aux cours →</a>
  <a href="index.php?page=formations">Voir d'autres formations</a>
</section>

<?php require 'views/partials/footer.php'; ?>