<?php session_start();
require_once "../Controleur/QuizzController.php";
if(!isset($_SESSION['login'])){header("Location: login.php");}
else{
    $quizzController=new QuizzController();
    $note=0;
    $questions=0;
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réponse du QCM</title>
    <link rel="stylesheet" href="../style/style.css">
</head>
<body>

    <section class="resultats">
        <h1>Résultat Du QCM de </h1> <span><?=$_SESSION['login']?></span>
        <?php foreach($_POST as $id_question=>$id_reponse){

            if($id_question!=="submit"){
                $questions+=1;
                $result=$quizzController->GetAnswerOfUser($id_reponse);
                if($result){
                    $note+=1;
    
                }
                else{
                    $question=$quizzController->GetLibelleQuestion($id_question);
                    $rightAnswer=$quizzController->GetRightAnswer($id_question);
                    echo '<p class="color">Tu Tes Planté a la question'.$id_question.'</p>';
                    echo '<p class="question_error">'.$question[0]['libelleQ'].'</p>';
                    echo '<p class="color">Il Fallait Répondre</p>';
                    echo '<p class="reponse_vrai">'.$rightAnswer[0]['libelle'].'</p>';
                }

            }
           
        }

        ?>
        <p class="note">Tu as eu juste A <?= $note?> Réponse/<?=$questions ?></p> 
    </section>
    
</body>
</html>