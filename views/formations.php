<?php
$pageTitle = 'Formations';
require 'views/partials/header.php';
?>

<section>
  <h1>Liste des Formations</h1>
  <a href="index.php?page=formations">Toutes</a> |
  <a href="index.php?page=formations&niveau=Débutant">Débutant</a> |
  <a href="index.php?page=formations&niveau=Intermédiaire">Intermédiaire</a> |
  <a href="index.php?page=formations&niveau=Avancé">Avancé</a>
  <hr>
  <?php if (empty($formations)): ?>
    <p>Aucune formation disponible.</p>
  <?php else: ?>
    <?php foreach ($formations as $f): ?>
      <div class="formation">
        <h2><?= htmlspecialchars($f['titre']) ?></h2>
        <p><?= htmlspecialchars($f['description']) ?></p>
        <p>Durée : <?= htmlspecialchars($f['duree']) ?> | Niveau : <?= htmlspecialchars($f['niveau']) ?></p>
        <p class="prix"><?= number_format($f['prix'], 2, ',', ' ') ?> DT</p>
        <a href="index.php?page=inscription&formation_id=<?= $f['id'] ?>">S'inscrire</a>
      </div>
    <?php endforeach; ?>
  <?php endif; ?>
</section>

<?php require 'views/partials/footer.php'; ?>