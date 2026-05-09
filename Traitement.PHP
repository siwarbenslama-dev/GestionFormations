<?php
// TP4 : Chargement des fichiers de fonctions
require "includes/fonctions.php";
require "includes/validation.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // TP4 : Nettoyage des données avec la fonction nettoyer()
    $nom    = nettoyer($_POST["nom"]);
    $prenom = nettoyer($_POST["prenom"]);
    $email  = nettoyer($_POST["email"]);

    // TP4 : Validation via la fonction dédiée
    $erreur = validerFormulaire($nom, $prenom, $email);

    // Affichage du résultat
    if (!empty($erreur)) {
        echo afficherErreur($erreur);
    } else {
        echo afficherSucces($nom, $prenom, $email);
    }

} else {
    // Accès direct au fichier sans passer par le formulaire
    echo "<p style='color:orange;'>Veuillez remplir le formulaire.</p>";
    echo "<a href='profil_form.html'>← Retour au formulaire</a>";
}
?>