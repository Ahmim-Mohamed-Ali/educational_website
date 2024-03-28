<?php session_start() ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation Enregistrement</title>
</head>
<body>

<div class="confirmation">
    <h3><?= "Bravo". $_SESSION['login']."Vous venez de créer un compte" ?></h3>
    <div class="recap">
        <h4>Récap Du Compte Crée</h4>
      <span>Login:</span>  <p><?= $_SESSION['email_account'] ?></p>
    </div>
</div>
    <?php header("Location: login.php ") ?>
</body>
</html>