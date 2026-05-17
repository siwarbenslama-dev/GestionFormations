<?php
$pageTitle = 'Paiement';
require 'views/partials/header.php';
?>

<section>
  <h1>Paiement</h1>

  <?php if ($inscription): ?>
    <div class="formation">
      <h2><?= htmlspecialchars($inscription['formation_titre']) ?></h2>
      <p>Nom : <?= htmlspecialchars($inscription['nom']) ?> <?= htmlspecialchars($inscription['prenom']) ?></p>
      <p>Email : <?= htmlspecialchars($inscription['email']) ?></p>
      <p class="prix"><?= number_format($inscription['prix'], 2, ',', ' ') ?> DT</p>
    </div>

    <?php if ($erreur_paiement): ?>
      <div class="alert" style="color:red;">Paiement refusé. Veuillez réessayer.</div>
    <?php endif; ?>

    <form method="POST" action="index.php?page=paiement&id=<?= $inscription['id'] ?>">
      <button type="submit" name="mode" value="ok" style="background:green;color:white;padding:10px 20px;">
        ✅ Paiement réussi
      </button>
      <button type="submit" name="mode" value="echec" style="background:red;color:white;padding:10px 20px;">
        ❌ Paiement refusé
      </button>
    </form>
  <?php else: ?>
    <p>Inscription introuvable.</p>
  <?php endif; ?>
</section>

<?php require 'views/partials/footer.php'; ?>