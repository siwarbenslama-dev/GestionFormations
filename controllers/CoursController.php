<?php
$formation_titre = $_SESSION['formation_titre'] ?? 'Formation inconnue';
$etudiant_prenom = $_SESSION['etudiant_prenom'] ?? 'Étudiant';

require 'views/cours.php';
?>