<?php 
require_once "../Model/CoursModel.php";
session_start() ;
$cours_Model= new CoursModel();
$id_prof=$_GET['id_prof'];
$cours_prof=$cours_Model->GetCourOfThisTeacher($id_prof);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vos Cours</title>
    <link rel="stylesheet" href="../style/style_student.css">
</head>
<body>
<?= include "header.php"  ?>

<div class="module">
    
</div>

<div class="cours_section">
        <h2>Liste De Vos Cours </h2>
        <div class="all-cours">
<?php foreach ($cours_prof as $cour): ?>
    <div class="cours ">
        <h3> Cours De <?= $cour['titre'] ?></h3>
        <p>Description: <?= $cour['description'] ?></p>
        <div class="item-cours">
        <a href="<?= $cour['url'] ?>">Lien Vers La Vidéo </a>
        <img src="../img/working_picture.jpg" alt="" srcset="" class="image_cours">
        <button><a href="<?= $cour['chemin'] ?>" target="_blank">Voir le Cours</a></button>
        <button><a href="niveau.php?id_cours=<?= $cour['id'] ?>" target="_blank">Répondre Au QCM</a></button>
        </div>       
 
    </div>
<?php endforeach; ?>

</div>
    </div>
    
</body>
</html>

