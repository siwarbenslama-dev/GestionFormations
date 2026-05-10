<?php
require 'includes/connexion.php';
require 'includes/validation.php';
require 'includes/fonctions.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nom          = trim($_POST['nom']          ?? '');
    $prenom       = trim($_POST['prenom']       ?? '');
    $email        = trim($_POST['email']        ?? '');
    $formation_id = (int)($_POST['formation_id'] ?? 0);

    $erreur = validerFormulaire($nom, $prenom, $email);

    if ($formation_id <= 0) {
        $erreur .= 'Veuillez choisir une formation.<br>';
    }

    if (!empty($erreur)) {
        $_SESSION['erreurs']  = [$erreur];
        $_SESSION['old_post'] = $_POST;
        header('Location: inscription.php');
        exit();
    } else {
        $pdo  = getConnexion();
        $stmt = $pdo->prepare(
            'INSERT INTO inscriptions (nom, prenom, email, formation_id, statut_paiement, date_inscription)
             VALUES (?, ?, ?, ?, "en_attente", NOW())'
        );
        $stmt->execute([$nom, $prenom, $email, $formation_id]);
        $id = $pdo->lastInsertId();

        echo afficherSucces($nom, $prenom, $email);
        echo "<p style='color:green;'>Inscription enregistrée ! ID : $id</p>";
        echo "<a href='formations.php'>← Retour aux formations</a>";
    }
} else {
    header('Location: inscription.php');
    exit();
}
?>