<?php 
session_start(); 
 require_once "../Controleur/QuizzController.php";
if(isset($_SESSION['login'])){
    if(isset($_SESSION['id_cours']) && isset($_SESSION['niveau'])){
        $id_cours=$_SESSION['id_cours'];
        $level=$_SESSION['niveau'];
        $quizz_controller=new QuizzController();

    }
}else{
    header("Location: login.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quizz</title>
    <link rel="stylesheet" href="../style/style_student.css">
</head>
<body>
    
<?php include "header.php" ?>


<section class="questions">
 <?= $quizz_controller->GetAllOfQuestions($id_cours,$level); ?>

</section>



</body>
</html>