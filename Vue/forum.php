<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum De Discussion</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="chat">
        <div class="button-email">
            <span>mohamedahmim@icloud.com</span>
            <a href="" class="deconnect_btn">Déconnexion</a>
        </div>

        <div class="message_box">
            <div class="message your_message">
                <span>Vous</span>
                <p>Comment Ca Va ?</p>
                <p class="date">26-12-2023</p>
            </div>

            <div class="message others_message">
                <span>azrty@gmail.com</span>
                    <p>Oui ca va </p>
            </div>
        </div>
        <form action="" class="send_message" method="POST">
        <textarea name="message" id="" cols="30" rows="2" placeholder="Votre Mesage"></textarea>
        <input type="submit" value="Envoyez" name="send">
        </form>
    </div>
</body>
</html>