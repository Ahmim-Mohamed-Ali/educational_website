<?php 
session_start(); 
if(!isset($_GET['id_cours']) && isset($_SESSION['login']))
{
    header("location: welcome.php");
}
else if(!isset($_SESSION['login']))
{
    header("location: login.php");
}
else{
$_SESSION['id_cours']=$_GET['id_cours'];

}

if(isset($_POST['button'])){
    if(isset($_POST['level'])){
        $_SESSION['niveau']=$_POST['level'];
        header("location:answer_quiz.php");


    }

    else{
        $error="Veuillez Choisir Un Niveau svp !";
    }
   


}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Niveau Page</title>
</head>
<body>
    

<!-- <?php include "header.php" ?> -->

<section class="niveau">
    <h4>Bonjour <span class="user_color"><?= $_SESSION['login'] ?></span>
    choissiez d'abord le niveau des questions
    </h4>

    <form action="" method="post">
        <p>Votre Niveau Actuel est: 
            <span class="user_color">
                <?php if(isset($_SESSION['niveau'])) {
                    if($_SESSION['niveau']==0){echo "Débutant";}
                   else{echo "Expert";} 
                
                } 
                else{echo "Aucun";}
                
                
                ?>
            </span>
        </p>
        <p class="error">
            <?php if(isset($error)){echo $error;} ?>
        </p>
        <div class="choices">
            <div class="choice">
                <input type="radio" name="level" value="0">Débutant
            </div>

            <div class="choice">
                <input type="radio" name="level" value="1">Expert
            </div>
        </div>
    <button name="button" class="style_btn">Soumettre</button>
    </form>
</section>
</body>
</html>