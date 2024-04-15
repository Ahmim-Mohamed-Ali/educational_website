<div class="header">
        <img src="../img/logo_univ.avif" alt="">
    <nav>
            <ul>
                <?php if($_SESSION['admin']==false): ?>
                    <li><a href="forum.php">Forum Etudiant</a></li>
                    <li><a href="../Controleur/Deconnexion_account.php">Déconnexion</a></li>
                    <?php if (isset($_GET['id_prof']) &&isset($_GET['id_student'])) : ?>
                        <li><a href="../Vue/welcome.php">Retour Aux Modules</a></li>
                    <?php endif; ?>
                <?php elseif($_SESSION['admin']==true) : ?>  
                    <li><a href="addcours.php">Ajouter Un Cours </a></li>
                    <li><a href="inscription.php">Inscrire Un Etudiant</a></li>
                    <li><a href="../Controleur/Deconnexion_account.php">Se Deconnecter</a></li>  
                <?php endif ; ?>    

            </ul>
        </nav>

    </div>