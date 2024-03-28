<?php
// index.php

// Autoload des classes
require_once '../Controleur/CoursController.php';


// Vérifier l'action demandée dans l'URL
if (isset($_GET['action'])) {

    echo "<p> hello </p>";
    $action = $_GET['action'];

    // Instancier le contrôleur approprié en fonction de l'action demandée
    $coursController = new CoursController();

    // Exécuter la méthode correspondant à l'action demandée
    if ($action === 'ajouterCours') {
        $coursController->ajouterCours();
    }
    else if($action=='coursAjoute'){
        header('Location: welcome_admin.php');
    }
}
?>
