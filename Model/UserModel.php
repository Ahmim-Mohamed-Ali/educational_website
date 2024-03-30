<?php

require_once 'connexion_bdd.php';


class UserModel {


    public function __construct() {
        
    }


    public function getUserInDatabase($email,$password) {
        $query = Connexion::getDb()->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
        $query->execute([$email, $password]);
        $result = $query->fetch(PDO::FETCH_ASSOC);
        if ($result) {
            return $result; // Retourne le tableau des données utilisateur si un utilisateur correspondant est trouvé
        } else {
            return false; // Retourne false s'il n'y a pas de correspondance
        }
    }

    public function InsertUserInDatabase($email, $password,$id_prof) {
        $user = $this->getUserInDatabase($email, $password);
        if ($user) {
            $role="etudiant";
            $my_insert_statement = Connexion::getDb()->prepare("INSERT INTO users (email, password,role) VALUES (:email, :password,:role)");
            $my_insert_statement->bindParam(':email', $email);
            $my_insert_statement->bindParam(':password', $password);
            $my_insert_statement->bindParam(':role', $role);   
                if($my_insert_statement->execute()){
                    $id_etudiant=Connexion::getDb()->lastInsertId(); 
                    $my_insert_statement2 = Connexion::getDb()->prepare("INSERT INTO etudiant_prof (id_etudiant,id_prof) VALUES (:id_etudiant, :id_prof)");
                    $my_insert_statement2->bindParam(':id_etudiant', $id_etudiant);
                    $my_insert_statement2->bindParam(':id_prof', $id_prof);
                        if ($my_insert_statement2->execute()) {
                            return true;
                        } else {
                            return false;
                        }
                }
            }    
            else
            {
                $id_etudiant=$this->getIdOfUserFromDatabase($email,$password);
                $my_insert_statement2 = Connexion::getDb()->prepare("INSERT INTO etudiant_prof (id_etudiant,id_prof) VALUES (:id_etudiant, :id_prof)");
                    $my_insert_statement2->bindParam(':id_etudiant', $id_etudiant);
                    $my_insert_statement2->bindParam(':id_prof', $id_prof);
                    if ($my_insert_statement2->execute()) {
                        return true;
                    } else {
                        return false;
                    }

            }         
    
}


    public function getAllStudentsFromDatabase() {
        $query = Connexion::getDb()->query("SELECT * FROM users");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteUserFromDatabase($userId,$profId) {
        $query = Connexion::getDb()->prepare("DELETE FROM etudiant_prof WHERE id_etudiant =:id_etudiant AND id_prof=:id_prof");
         $query->bindParam(':id_prof', $profId);
         $query->bindParam(':id_etudiant', $userId);
        if ($query->execute()) {
            return true;
          } else {
            return false;
          }
    }

    public function getAllIdProfesseur($student_id){
        $id_profs=array();
            $sql = "SELECT *
            FROM users
            INNER JOIN etudiant_prof ON users.id = etudiant_prof.id_etudiant
            WHERE etudiant_prof.id_etudiant = :id_etudiant";

            // Préparation de la requête
            $stmt = Connexion::getDb()->prepare($sql);

            // Liaison du paramètre
            $stmt->bindParam(':id_etudiant', $student_id, PDO::PARAM_INT);

            // Exécution de la requête
            $stmt->execute();

            // Récupération des résultats
            $resultats = $stmt->fetchAll(PDO::FETCH_ASSOC);
            // Affichage des ID des professeurs de l'étudiant
            foreach ($resultats as $resultat) {
                $id_profs[]=$resultat['id_prof'];
        }
        return $id_profs;
    }

    public function getMyStudentsFromDatabase($id) {
        $sql = "SELECT *
        FROM users
        INNER JOIN etudiant_prof ON users.id = etudiant_prof.id_etudiant
        WHERE etudiant_prof.id_prof = :id_prof";
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


    public function getIdOfUserFromDatabase($email,$password){
        $students=$this->getAllStudentsFromDatabase();
        foreach($students as $student){
            if($student['email']==$email && $student['password']==$password){
                return $student['id'];
            }

        }
        return 0;
    }
}

?>