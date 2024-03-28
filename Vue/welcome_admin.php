<?php session_start();
require_once "../Controleur/Get_Student_Controller.php";
// Créer une instance du contrôleur
$getAllController = new GetAllController();
// Appeler la méthode pour récupérer tous les étudiants et les afficher dans la vue
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Partie Administrateur</title>
    <link rel="stylesheet" href="../style_admin.css">
</head>
<body>

<nav>
    <ul>
        <li><a href="cours.php">Ajouter Un Cours </a></li>
        <li><a href="manage.php">Gérer Les QCM</a></li>
        <li><a href="inscription.php">Inscrire Un Etudiant</a></li>
    </ul>
</nav>
    <h2 class="welcome">Bienvenu sur votre Espace Administrateur <?= $_SESSION['login'] ?></h2>

    <div class="all">
        <h4>Liste De Vos Etudiants</h4>
        <div class="all-students">
        <?php $getAllController->getAllStudents(); ?>
        </div>


    </div>



    <div class="all">
        <h4>Liste De Vos Cours</h4>
        <div class="all-courses">
        <?php $getAllController->getAllStudents(); ?>
        </div>


    </div>
    
</body>
</html>