<?php
require_once 'models/Formation.php';

$niveau = $_GET['niveau'] ?? '';

if (!empty($niveau)) {
    $formations = Formation::getByNiveau($niveau);
} else {
    $formations = Formation::getAll();
}

require 'views/formations.php';
?>