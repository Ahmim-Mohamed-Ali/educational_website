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
    <div class="header">
        <img src="../img/logo_univ.avif" alt="">
    <nav>
            <ul>
                <li><a href="forum.php">Allez AU Chat !</a></li>
                <li><a href="../Controleur/Deconnexion_account.php">Se Deconnecter !</a></li>
            </ul>
        </nav>

    </div>
 
    <h1> Bienvenue sur votre espace Etudiant <span><?php echo $_SESSION['login'] ?> </span></h1>
   
    <div class="cours_section">
        <h2>Liste De Vos Cours </h2>
        <div class="all-cours">
        <?php $coursController->RecupererCoursById($id); ?>
        </div>
    </div>
   
</body>
</html>