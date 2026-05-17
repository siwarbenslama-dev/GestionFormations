<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require 'includes/connexion.php';
$pdo = getConnexion();

$niveau = $_GET['niveau'] ?? '';

if (!empty($niveau)) {
    $stmt = $pdo->prepare('SELECT * FROM formations WHERE niveau = ?');
    $stmt->execute([$niveau]);
} else {
    $stmt = $pdo->query('SELECT * FROM formations ORDER BY id ASC');
}
$formations = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Nos Formations</title>
  <style>
    body { font-family: Arial, sans-serif; margin: 30px; }
    .formation { border: 1px solid #ddd; padding: 20px; margin: 15px 0; border-radius: 8px; }
    .prix { color: #e67e22; font-size: 1.3em; font-weight: bold; }
  </style>
</head>
<body>
  <h1>Liste des Formations</h1>
  <a href="formations.php">Toutes</a> |
  <a href="formations.php?niveau=Débutant">Débutant</a> |
  <a href="formations.php?niveau=Intermédiaire">Intermédiaire</a> |
  <a href="formations.php?niveau=Avancé">Avancé</a>
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
        <a href="inscription.php?formation_id=<?= $f['id'] ?>">S'inscrire</a>
      </div>
    <?php endforeach; ?>
  <?php endif; ?>
</body>
</html>