<?php
// index.php

// Autoload des classes
require_once '../Controleur/CoursController.php';


// Vérifier l'action demandée dans l'URL
if (isset($_GET['action'])) {
    $action = $_GET['action'];
        if($action=='coursAjoute'){
        header('Location: welcome_admin.php');
    }
}
?>
