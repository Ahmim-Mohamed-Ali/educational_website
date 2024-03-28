<?php
    require_once 'connexion_bdd.php';

class CoursModel {

    public function __construct() {
        
    }


    public function ajouterCours($titre, $description,$cheminFichier) {
        $url="youtube.com";
        $query = Connexion::getDb()->prepare("INSERT INTO cours (titre, description,chemin,url) VALUES (?, ?,?,?)");
        $query->execute([$titre, $description,$cheminFichier,$url]);
    }
}
?>