<?php 
require_once '../Controleur/LoginController.php'; // Inclure la classe du contrôleur de connexion


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $loginController = new LoginController();

    if(isset($_POST['email']) && isset($_POST['mdp1']) && $_POST['email']!=='' && $_POST['mdp1']!=""){
        $email = $_POST['email'];
        $password = $_POST['mdp1'];
        $loginController->login($email, $password);

    }
    else{
        $error="Veuillez Remplir Tout les Champs";
    }

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

<form action="" class="form_connexion_inscription" method="post">
    <h1>Connexion</h1>
    <p class="message-error">
        <?php  if(isset($error)): echo $error ?>
        <?php elseif( isset($loginController) && $loginController->getErrorMessage()!==null): echo $loginController->getErrorMessage()  ?>
        <?php endif; ?> 
    </p>
    <label for="">Adresse Mail</label>
    <input type="email" name="email">
    <label for="">Mot de Passe</label>
    <input type="password" name="mdp1">
    <input type="submit" value="connexion">
    <p class="link">Vous N'Avez Pas De Compte ? <a href="../index.php">Créer Un Compte</a></p>
</form>
    
</body>
</html>