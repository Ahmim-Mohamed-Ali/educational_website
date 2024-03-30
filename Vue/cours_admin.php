<?php foreach ($cours as  $cour): ?>
    <div class="cours ">
        <h4> <?= $cour['titre'] ?></h4>
        <p>Description: <?= $cour['description'] ?></p>
        <p>Url Vidéo: <?= $cour['url'] ?></p>
        <img src="../img/cours_default_image.webp" alt="" srcset="" class="image_cours">
        <button><a href="<?= $cour['chemin'] ?>" target="_blank">Voir le Cours</a></button>
        <form action="" method="post">
            <input type="hidden" name="id" value=<?=$cour['id'] ?>>
        <button type="submit" name="btn-delete" >Supprimer</button>
        </form>
    </div>
<?php endforeach; ?>
