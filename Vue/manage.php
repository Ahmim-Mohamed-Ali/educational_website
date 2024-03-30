<?php foreach ($students as $student): ?>
    <div class="student">
        <form action="" method="post">
            <input type="hidden" name="id_student" value="<?= $student['id'] ?>">
            <p>Nom: <?= $student['email'] ?></p>
            <p>Prénom: <?= $student['password'] ?></p>
            <button type="submit" name="delete">Supprimer</button>
        </form>
        <form action="modif.php" method="post">
            <input type="hidden" name="id" value="<?= $student['id'] ?>">
            <button type="submit" name="edit">Modifier</button>
        </form>
    </div>
<?php endforeach; ?>


    
