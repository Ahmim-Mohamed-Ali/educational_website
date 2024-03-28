<?php

require_once '../Model/CoursModel.php';

class CoursController {
    public function ajouterCours() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $titre = $_POST['titre'];
            $description = $_POST['description'];

            // Traitement du fichier téléchargé
            if ($_FILES['diapositives']['error'] === UPLOAD_ERR_OK) {
                $cheminFichier = '../../uploads/' . basename($_FILES['diapositives']['name']);
                if (move_uploaded_file($_FILES['diapositives']['tmp_name'], $cheminFichier)) {
                    // Enregistrement du chemin du fichier dans la base de données
                    $coursModel = new CoursModel();
                    $coursModel->ajouterCours($titre, $description, $cheminFichier);
                } else {
                    echo "Une erreur s'est produite lors du téléchargement du fichier.";
                }
            } else {
                echo "Erreur lors du téléchargement du fichier.";
            }
            
            // Redirection vers une autre page après l'ajout du cours
            header('Location: index.php?action=coursAjoute');
            exit;
        }
    }
}






?>
