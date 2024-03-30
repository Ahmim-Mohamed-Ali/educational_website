<?php
    require_once 'connexion_bdd.php';

class CoursModel {
    protected $array_cours;

    public function __construct() {
        $array_cours= array();
        $this->GetAllCoursFromDatabase();

    }


    public function AddCours($titre, $description,$cheminFichier,$url,$id_prof) {
        $query = Connexion::getDb()->prepare("INSERT INTO cours (titre, description,chemin,url) VALUES (?, ?,?,?)");
        $query->execute([$titre, $description,$cheminFichier,$url]);
        $id_cours_insere = Connexion::getDb()->lastInsertId();
        $query2 = Connexion::getDb()->prepare("INSERT INTO cours_prof (id_cours, id_prof) VALUES (?, ?)");
        $query2->execute([$id_cours_insere,$id_prof]);
    }

    public function GetAllCoursFromDatabase(){
        $query = Connexion::getDb()->query("SELECT * FROM cours");
        $cours= $query->fetchAll(PDO::FETCH_ASSOC);
        foreach ($cours as $cour){
            $this->array_cours[]=$cour;
           
        }
            
        return $cours;
    }

    public function DeleteCours($id){
        $query = Connexion::getDb()->prepare("DELETE FROM cours WHERE id = ? ");
        $query2 = Connexion::getDb()->prepare("DELETE FROM cours_prof WHERE id_cours = ? ");
        if ($query->execute([$id]) && $query->execute([$id])) {
            return true;
          } else {
            return null;
          }
    }

    public function GetArrayCours(){
        return $this->array_cours;
    }

    public function GetCourId($id){
        foreach ($this->array_cours as $cour){
            if($cour['id']==$id){
              return $cour;
            }
            
        }
    }

    public function GetCourOfTeacher($id){
        $sql = "SELECT *
        FROM cours
        INNER JOIN cours_prof ON cours.id = cours_prof.id_cours
        WHERE cours_prof.id_prof = :id_prof";
        // Préparation de la requête
        $stmt = Connexion::getDb()->prepare($sql);
        // Liaison du paramètre
        $stmt->bindParam(':id_prof', $id, PDO::PARAM_INT);
        // Exécution de la requête
        $stmt->execute();
        // Récupération des résultats
        $resultats = $stmt->fetchAll(PDO::FETCH_ASSOC);    
        return $resultats;
    }
}
?>