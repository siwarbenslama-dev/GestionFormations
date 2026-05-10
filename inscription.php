<?php
session_start();
require 'includes/connexion.php';
$pdo = getConnexion();
$stmt = $pdo->query('SELECT id, titre, prix FROM formations ORDER BY id ASC');
$formations = $stmt->fetchAll();
$formation_preselect = isset($_GET['formation_id']) ? (int)$_GET['formation_id'] : 0;
$erreurs  = $_SESSION['erreurs']  ?? [];
$old_post = $_SESSION['old_post'] ?? [];
unset($_SESSION['erreurs'], $_SESSION['old_post']);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; background: #f5f5f5; }
        h1 { color: #1A3A5C; }
        .form-box { background: white; padding: 30px; border-radius: 8px; max-width: 560px; box-shadow: 0 2px 10px rgba(0,0,0,.08); }
        label { display: block; font-weight: bold; margin-top: 16px; margin-bottom: 4px; }
        input, select { width: 100%; padding: 8px 12px; border: 1px solid #ccc; border-radius: 4px; font-size: 1em; box-sizing: border-box; }
        .required { color: red; }
        .btn { display: block; width: 100%; margin-top: 24px; padding: 12px; background: #1A3A5C; color: white; font-size: 1.05em; border: none; border-radius: 6px; cursor: pointer; }
        .btn:hover { background: #24527a; }
        .alert { background: #fff0f0; border-left: 4px solid #e53935; padding: 12px 16px; margin-bottom: 20px; border-radius: 4px; }
    </style>
</head>
<body>
    <h1>Inscription à une Formation</h1>
    <div class="form-box">
        <?php if (!empty($erreurs)): ?>
            <div class="alert">
                <strong>Erreurs :</strong>
                <ul>
                    <?php foreach ($erreurs as $e): ?>
                        <li><?= htmlspecialchars($e) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
        <form method="POST" action="traitement.php">
            <label>Nom <span class="required">*</span></label>
            <input type="text" name="nom" value="<?= htmlspecialchars($old_post['nom'] ?? '') ?>" required>
            <label>Prénom <span class="required">*</span></label>
            <input type="text" name="prenom" value="<?= htmlspecialchars($old_post['prenom'] ?? '') ?>" required>
            <label>Email <span class="required">*</span></label>
            <input type="email" name="email" value="<?= htmlspecialchars($old_post['email'] ?? '') ?>" required>
            <label>Formation <span class="required">*</span></label>
            <select name="formation_id" required>
                <option value="">-- Choisir une formation --</option>
                <?php foreach ($formations as $f): ?>
                    <option value="<?= $f['id'] ?>" <?= ($old_post['formation_id'] ?? $formation_preselect) == $f['id'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($f['titre']) ?> – <?= $f['prix'] ?> DT
                    </option>
                <?php endforeach; ?>
            </select>
            <button type="submit" class="btn">Valider l'inscription →</button>
        </form>
    </div>
</body>
</html>