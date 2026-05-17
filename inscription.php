<?php
session_start();
require 'includes/connexion.php';

$pdo = getConnexion();
$stmt = $pdo->query('SELECT id, titre, prix FROM formations ORDER BY id ASC');
$formations = $stmt->fetchAll();

$formation_preselect = isset($_GET['formation_id']) ? (int)$_GET['formation_id'] : 0;

$erreurs = $_SESSION['erreurs'] ?? [];
$old_post = $_SESSION['old_post'] ?? [];
unset($_SESSION['erreurs'], $_SESSION['old_post']);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Inscription</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <h1>Inscription à une Formation</h1>

  <?php if (!empty($erreurs)): ?>
    <div style="color:red;">
      <ul>
        <?php foreach ($erreurs as $e): ?>
          <li><?= htmlspecialchars($e) ?></li>
        <?php endforeach; ?>
      </ul>
    </div>
  <?php endif; ?>

  <form method="POST" action="traitement.php">
    <label>Nom *</label><br>
    <input type="text" name="nom" value="<?= htmlspecialchars($old_post['nom'] ?? '') ?>" required><br><br>

    <label>Prénom *</label><br>
    <input type="text" name="prenom" value="<?= htmlspecialchars($old_post['prenom'] ?? '') ?>" required><br><br>

    <label>Email *</label><br>
    <input type="email" name="email" value="<?= htmlspecialchars($old_post['email'] ?? '') ?>" required><br><br>

    <label>Formation *</label><br>
    <select name="formation_id" required>
      <option value="">-- Choisir --</option>
      <?php foreach ($formations as $f): ?>
        <option value="<?= $f['id'] ?>" <?= ($formation_preselect == $f['id']) ? 'selected' : '' ?>>
          <?= htmlspecialchars($f['titre']) ?> – <?= $f['prix'] ?> DT
        </option>
      <?php endforeach; ?>
    </select><br><br>

    <input type="submit" value="S'inscrire">
  </form>
</body>
</html>