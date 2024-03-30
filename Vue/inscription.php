<?php 
session_start();
require_once '../Controleur/RegisterController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $registerController = new RegisterController();

    if(isset($_POST['email']) && isset($_POST['mdp1']) && $_POST['mdp1']==$_POST['mdp2']){
        $email = $_POST['email'];
        $password = $_POST['mdp1'];
        $id_prof=$_SESSION['id'];
       $registerController->RegisterUser($email,$password,$id_prof);
        if($registerController->getMessage()!=null){
            $error=$registerController->getMessage();
        }
    }
    else{
        $error="Veuillez Remplir Tout les Champs avec des mots de passes identiques !";
    }

}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="../style/style.css">
</head>
<body>

<form action="" class="form_connexion_inscription" method="POST">
    <h1>Inscription</h1>
    <p class="message-error">
        <?php if(isset($error)) echo $error ?> 
    </p>
    <label for="">Adresse Mail</label>
    <input type="email" name="email">
    <label for="">Mot de Passe</label>
    <input type="password" name="mdp1" class="mdp1">
    <label for=""> Confirmer Mot de Passe</label>
    <input type="password" name="mdp2" class="mdp2">
    <input type="submit" value="Inscription">
    <p class="link">Vous Avez Un Compte ? <a href="../index.php">Se Connecter </a></p>
</form>
    <script src="../script.js"></script>
</body>
</html>