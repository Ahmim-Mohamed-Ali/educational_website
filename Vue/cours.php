<?php
session_start();

// Vérifier si l'utilisateur est connecté en tant qu'administrateur
if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    // Rediriger l'utilisateur vers la page de connexion
    header('Location: login.php');
    exit; // Arrêter l'exécution du script après la redirection
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form action="index.php?action=ajouterCours" method="post" enctype="multipart/form-data">
    <label for="titre">Titre du cours :</label>
    <input type="text" id="titre" name="titre" required><br><br>
    
    <label for="description">Description :</label><br>
    <textarea id="description" name="description" rows="4" cols="50" required></textarea><br><br>
    
    <label for="diapositives">Diapositives (PDF) :</label>
    <input type="file" id="diapositives" name="diapositives"><br><br>
    
    <label for="video">URL de la vidéo :</label>
    <input type="text" id="video" name="video"><br><br>
    
    <input type="submit" value="Ajouter le cours">
</form>

    
</body>
</html>

