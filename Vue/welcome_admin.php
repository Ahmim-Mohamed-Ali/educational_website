<?php session_start();
require_once "../Controleur/Get_Student_Controller.php";
require_once "../Controleur/CoursController.php";
require_once "../Controleur/DeleteController.php";
if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    // Rediriger l'utilisateur vers la page de connexion
    header('Location: login.php');
    exit; // Arrêter l'exécution du script après la redirection
}

else{
// Créer une instance du contrôleur
$getAllController = new GetAllController();
$coursController=new CoursController();
$id=$_SESSION['id'];
}
if(isset($_POST['btn-delete'])){
    $coursController->DeleteCours($_POST['id']);
}

if(isset($_POST['delete'])){
    $id_etudiant=$_POST['id_student'];
    $deleteController= new DeleteController();
    $deleteController->DeleteStudent($id_etudiant,$id);
}

if(isset($_POST['btn-add-qcm'])){
    
}
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Partie Administrateur <?= $_SESSION['login'] ?></title>
    <link rel="stylesheet" href="../style/style_admin.css">
    <script src="../script.js"></script>
</head>
<body>
<?php include "header.php" ?>
<!-- <nav>
    <ul>
        <li><a href="addcours.php">Ajouter Un Cours </a></li>
        <li><a href="manage.php">Gérer Les QCM</a></li>
        <li><a href="inscription.php">Inscrire Un Etudiant</a></li>
        <li><a href="../Controleur/Deconnexion_account.php">Se Deconnecter</a></li>
    </ul>
</nav> -->
    <h2 class="welcome">Bienvenu sur votre Espace Administrateur <span> <?= $_SESSION['login'] ?> </span></h2>

    <div class="all">
        <h2>Liste De Vos Etudiants</h4>
        <div class="all-students">
        <?php $getAllController->getMyStudents($id); ?>
        </div>
    </div>

   <div class="all">
        <h2>Liste De Vos Cours</h4>
        <div class="all-courses">
        <?php 
        $coursController->RetriveCoursForAdmin($id); ?>
        </div>
    </div>    
</body>
</html>