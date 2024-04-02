<?php
session_start();


require_once '../Controleur/CoursController.php';
// Vérifier si l'utilisateur est connecté en tant qu'administrateur
if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    // Rediriger l'utilisateur vers la page de connexion
    header('Location: login.php');
    exit; // Arrêter l'exécution du script après la redirection
}


if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $id_prof=$_SESSION['id'];
    $coursController = new CoursController();
    $coursController->AddCours($id_prof);

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter Votre Cours</title>
</head>
<body>
<div class="formulaire">

<form action="" method="post" enctype="multipart/form-data">
    <div class="titre">
    <label for="titre">Titre du cours :</label>
    <input type="text" id="titre" name="titre" required><br><br>
    </div>
    
    <div class="description">
    <label for="description">Description :</label><br>
    <textarea id="description" name="description" rows="4" cols="50" required></textarea><br><br>
    </div>
    
    <div class="diapo">
    <label for="diapositives">Diapositives (PDF) :</label>
    <input type="file" id="diapositives" name="diapositives"><br><br>
    </div>
    
    <div class="video">
    <label for="video">URL de la vidéo :</label>
    <input type="text" id="video" name="video" required><br><br>
    </div> 
    
    <input type="submit" value="ajouterCours">
    </form>
 <?php   if (isset($_GET['error'])) {
    $error = $_GET['error'];
    echo "<p style='color: red;'>Erreur : $error</p>";
    } ?>
</div>

    
</body>
</html>

