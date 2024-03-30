
<div class="chat">
        <div class="button-email">
            <span><?= $_SESSION['login'] ?></span>
            <a href="../Controleur/Deconnexion.php" class="deconnect_btn">Déconnexion</a>
        </div>

        <div class="message_box">
            <?php if(!isset($error)): ?>
                <?php foreach($messages as $message) : ?>
                            <?php if($message['email']==$_SESSION['login']): ?>
                            <div class="message your_message">
                                <span><?= $message['email'] ?></span>
                                <p> <?=$message['message'] ?></p>
                                <p class="date"><?=$message['date'] ?></p>
                            </div>
                            <?php else : ?>
                                        <div class="message others_message">
                                            <span><?= $message['email'] ?></span>
                                                <p><?=$message['message'] ?> </p>
                                                <p class="date"><?=$message['date'] ?></p>
                                        </div>
                            <?php endif;?>
                <?php endforeach; ?>  
             <?php else : ?>
                <div class="warning">
                    <p>Aucun Message pour le Moment</p>
                </div> 
            <?php endif; ?>               
        </div>
        <form action="forum.php" class="send_message" method="post">
            <textarea name="message" id="" cols="30" rows="2" placeholder="Votre Message"></textarea>
            <input type="submit" value="Envoyez" name="send">
        </form>

    </div>