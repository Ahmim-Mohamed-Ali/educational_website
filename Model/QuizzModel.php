<?php

require_once 'connexion_bdd.php';
class QuizzModel{

    protected $array_questions;
    protected $array_answers;

    public function __construct() {
        $array_questions= array();
        $array_answers=array();

    }

    public function GetAllQuestions($id_cours, $level){
        $sql = "SELECT *
        FROM question
        WHERE question.id_cours = :id_cours AND question.niveau=:level";
        // Préparation de la requête
        $stmt = Connexion::getDb()->prepare($sql);
        // Liaison du paramètre
        $stmt->bindParam(':id_cours', $id_cours, PDO::PARAM_INT);
        $stmt->bindParam(':level', $level, PDO::PARAM_INT);
        // Exécution de la requête
        $stmt->execute();
        // Récupération des résultats
        $resultats = $stmt->fetchAll(PDO::FETCH_ASSOC); 
        return $resultats;
    }


    public function GetAllAnswers($id_question){
        $sql = "SELECT *
        FROM reponse
        WHERE reponse.id_question = :id_question";
        // Préparation de la requête
        $stmt = Connexion::getDb()->prepare($sql);
        // Liaison du paramètre
        $stmt->bindParam(':id_question', $id_question, PDO::PARAM_INT);
        // Exécution de la requête
        $stmt->execute();
        // Récupération des résultats
        $resultats = $stmt->fetchAll(PDO::FETCH_ASSOC); 
        //var_dump($resultats);
        return $resultats;
    }

    public function GetAnswerOfUser($id_reponse){

        $sql = "SELECT *
        FROM reponse
        WHERE reponse.id_reponse = :id_reponse AND reponse.verite=1";
        // Préparation de la requête
        $stmt = Connexion::getDb()->prepare($sql);
        // Liaison du paramètre
        $stmt->bindParam(':id_reponse', $id_reponse, PDO::PARAM_INT);
        // Exécution de la requête
        $stmt->execute();
        // Récupération des résultats
        $resultats = $stmt->fetchAll(PDO::FETCH_ASSOC); 
        //var_dump($resultats);
        return $resultats;

    }



    public function GetLibelleOfQuestion($id_question){
        $sql = "SELECT *
        FROM question
        WHERE question.id = :id" ;
        // Préparation de la requête
        $stmt = Connexion::getDb()->prepare($sql);
        // Liaison du paramètre
        $stmt->bindParam(':id', $id_question, PDO::PARAM_INT);

        // Exécution de la requête
        $stmt->execute();
        // Récupération des résultats
        $resultats = $stmt->fetchAll(PDO::FETCH_ASSOC); 
        //var_dump($resultats);
        return $resultats;
    
    }


    public function GetRightAnswer($id_question){
        $sql = "SELECT *
        FROM reponse
        WHERE reponse.id_question = :id AND reponse.verite=1" ;
        // Préparation de la requête
        $stmt = Connexion::getDb()->prepare($sql);
        // Liaison du paramètre
        $stmt->bindParam(':id', $id_question, PDO::PARAM_INT);

        // Exécution de la requête
        $stmt->execute();
        // Récupération des résultats
        $resultats = $stmt->fetchAll(PDO::FETCH_ASSOC); 
        //var_dump($resultats);
        return $resultats;

    }

}

?>
