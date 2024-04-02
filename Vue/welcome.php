<?php session_start() ;
    require_once "../Model/UserModel.php";
    require_once "../Controleur/CoursController.php";
    if(!isset($_SESSION['login'])){ header("Location: login.php") ; }
    else{
        $id=$_SESSION['id'];
        $coursController=new CoursController();
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenue</title>
   <link rel="stylesheet" href="../style/style_student.css">
</head>
<body>
    <?php include "header.php" ?>
    <h1> Bienvenue sur votre espace Etudiant <span><?php echo $_SESSION['login'] ?> </span></h1>
 <div class="top-page">
    <div class="div_cours">
        <h4>Mes Cours</h4>
    </div>

    <div class="trait-horizontal">
        <h2>Vue d'ensemble des Modules:</h2>
        <hr>
    </div>


 </div>
    
  

    <div class="cours_section">
        <h2>Liste De Vos Modules </h2>
        <div class="all-cours">
        <?php $coursController->RetriveAllModulesById($id); ?>
        </div>
    </div>
   
</body>
</html>