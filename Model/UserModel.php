<?php

require_once 'connexion_bdd.php';


class UserModel {


    public function __construct() {
        
    }


    public function getUserInDatabase($email,$password) {
        $query = Connexion::getDb()->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
        $query->execute([$email, $password]);
        $result = $query->fetch(PDO::FETCH_ASSOC);
        echo $result;
        if ($result) {
            return $result; // Retourne le tableau des données utilisateur si un utilisateur correspondant est trouvé
        } else {
            return false; // Retourne false s'il n'y a pas de correspondance
        }
    }

    public function InsertUserInDatabase($email, $password) {
        $role="etudiant";
    $my_insert_statement = Connexion::getDb()->prepare("INSERT INTO users (email, password,role) VALUES (:email, :password,:role)");
    $my_insert_statement->bindParam(':email', $email);
    $my_insert_statement->bindParam(':password', $password);
    $my_insert_statement->bindParam(':role', $role);
    if ($my_insert_statement->execute()) {
        return true;
      } else {
        return false;
      }
}


    public function getAllStudentsFromDatabase() {
        $query = Connexion::getDb()->query("SELECT * FROM users");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteUserFromDatabase($userId) {
        $query = Connexion::getDb()->prepare("DELETE FROM users WHERE id = ?");
        if ($query->execute([$userId])) {
            return true;
          } else {
            return false;
          }
    }

    



}

?>