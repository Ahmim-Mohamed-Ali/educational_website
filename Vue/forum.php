<?php
session_start();
require_once "../Controleur/ChatController.php";

if(isset($_SESSION['login'])){
    $email = $_SESSION['login'];
    $chatController = new ChatController();

    // Vérifier si le formulaire a été soumis
    if(isset($_POST['send'])){
        // Récupérer le message du formulaire
        $message = isset($_POST['message']) ? $_POST['message'] : '';
        echo $message;
        // Si le message n'est pas vide, ajoutez-le au chat
        if(!empty($message)){

            $chatController->AddChat($email, $message);
        }
    }
} else {
    // Si l'utilisateur n'est pas connecté, redirigez-le vers la page de connexion
    header("Location: login.php");
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="20">
    <title> <?=$email ?>Forum De Discussion</title>
    <link rel="stylesheet" href="../style/style.css">
</head>
<body>
 <?= $chatController->RecupererChat($email) ?>
</body>
</html>