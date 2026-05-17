<?php
$pageTitle = 'Cours';
require 'views/partials/header.php';
?>

<section>
  <h1>📚 Accès aux Cours</h1>
  <p>Bienvenue <strong><?= htmlspecialchars($etudiant_prenom) ?></strong> !</p>
  <p>Vous avez accès aux cours de : <strong><?= htmlspecialchars($formation_titre) ?></strong></p>

  <div class="formation">
    <h2>Chapitre 1 — Introduction</h2>
    <p>Contenu du premier chapitre...</p>
  </div>

  <div class="formation">
    <h2>Chapitre 2 — Concepts avancés</h2>
    <p>Contenu du deuxième chapitre...</p>
  </div>

  <div class="formation">
    <h2>Chapitre 3 — Projet final</h2>
    <p>Contenu du troisième chapitre...</p>
  </div>

  <br>
  <a href="index.php">🏠 Retour à l'accueil</a>
</section>

<?php require 'views/partials/footer.php'; ?>