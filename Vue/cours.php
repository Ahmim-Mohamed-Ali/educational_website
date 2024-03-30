<?php foreach ($cours as $cours_prof): ?>
    <?php foreach ($cours_prof as $cour): ?>
    <div class="cours ">
        <h3> Cours De <?= $cour['titre'] ?></h3>
        <p>Description: <?= $cour['description'] ?></p>
        <div class="item-cours">
        <a href="<?= $cour['url'] ?>">Lien Vers La Vidéo </a>
        <img src="../img/cours_default_image.webp" alt="" srcset="" class="image_cours">
        <button><a href="<?= $cour['chemin'] ?>" target="_blank">Voir le Cours</a></button>
        </div>       
 
    </div>
<?php endforeach; ?>
<?php endforeach; ?>
