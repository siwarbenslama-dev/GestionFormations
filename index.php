<?php
session_start();
$page = $_GET['page'] ?? 'home';

if ($page === 'cours') {
    if (!isset($_SESSION['paiement_ok']) || $_SESSION['paiement_ok'] !== true) {
        header('Location: index.php');
        exit();
    }
}

switch ($page) {
    case 'formations':
        require 'controllers/FormationController.php';
        break;
    case 'inscription':
        require 'controllers/InscriptionController.php';
        break;
    case 'paiement':
        require 'controllers/PaiementController.php';
        break;
    case 'cours':
        require 'controllers/CoursController.php';
        break;
    case 'succes':
        require 'views/succes.php';
        break;
    default:
        require 'views/home.php';
}
?>