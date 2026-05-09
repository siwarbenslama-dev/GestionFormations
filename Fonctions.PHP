<?php

/**
 * Affiche un bloc d'erreur en rouge.
 * @param string $erreur  Message(s) d'erreur à afficher.
 * @return string         HTML du bloc erreur, ou chaîne vide.
 */
function afficherErreur($erreur) {
    if (!empty($erreur)) {
        return "<div style='color:red; background:#fdd; padding:10px; border-radius:4px;'>$erreur</div>";
    }
    return "";
}

/**
 * Affiche un bloc de succès en vert avec les données de l'utilisateur.
 * @param string $nom
 * @param string $prenom
 * @param string $email
 * @return string  HTML du bloc succès.
 */
function afficherSucces($nom, $prenom, $email) {
    return "<div style='color:green; background:#dfd; padding:10px; border-radius:4px;'>
        Formulaire valide ✔<br>
        <strong>Nom :</strong> $nom<br>
        <strong>Prénom :</strong> $prenom<br>
        <strong>Email :</strong> $email
    </div>";
}

/**
 * Nettoie une donnée utilisateur (supprime espaces + échappe les balises HTML).
 * @param string $data  Valeur brute.
 * @return string       Valeur nettoyée.
 */
function nettoyer($data) {
    return htmlspecialchars(trim($data));
}
?>