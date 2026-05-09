<?php

/**
 * Valide les données du formulaire profil.
 * @param string $nom
 * @param string $prenom
 * @param string $email
 * @return string  Chaîne d'erreurs (vide si tout est valide).
 */
function validerFormulaire($nom, $prenom, $email) {
    $erreur = "";

    if (empty($nom)) {
        $erreur .= "Le nom est obligatoire.<br>";
    }

    if (empty($prenom)) {
        $erreur .= "Le prénom est obligatoire.<br>";
    }

    if (empty($email)) {
        $erreur .= "L'email est obligatoire.<br>";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erreur .= "Format email invalide.<br>";
    }

    return $erreur;
}
?>