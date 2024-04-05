<?php foreach ($modules as $module_prof): ?>
    <div class="cours">
        <h3> Module Enseigne Par enseignant Numéro <?= $module_prof[0]['id_prof'] ?></h3>
        <div class="item-cours">
        <p>Responsable Enseignement: <?= $module_prof[0]['email'] ?></p>
        <img src="../img/working_picture.jpg" alt="" srcset="" class="image_cours">
        <button><a href="cours.php?id_prof=<?= $module_prof[0]["id_prof"] ?>&id_student=<?= $_SESSION['id']; ?>" target="_blank">Voir le Module</a></button>
        
        </div>       
 
    </div>
<?php endforeach; ?>
