<?php

require_once 'connexion_bdd.php';


class ChatModel {
    protected $your_messages;
    protected $other_messages;

    public function __construct() {
        $your_messages= array();
        $other_messages=array();
    }


    public function getMessageInDatabase($email) {
        $query = Connexion::getDb()->query("SELECT * FROM chat");
        $results= $query->fetchAll(PDO::FETCH_ASSOC);
        if ($results) {
            foreach($results as $result){
                if($result['email']===$email){
                    $this->your_messages[]=$email;

                }
                else{
                    $this->other_messages[]=$email;
                }
            }
            return $results; // Retourne le tableau des données du chat  trouvé
        } else {
            return null; // Retourne false s'il n'y a pas de correspondance
        }
    }


    public function GetYourMessage(){
        return $this->your_messages;
    }

    public function GetOtherMessage(){
        return $this->other_messages;
    }

    public function AddMessageInDatabase($email,$message){
        $my_insert_statement = Connexion::getDb()->prepare("INSERT INTO chat (email, message) VALUES (:email, :message)");
    $my_insert_statement->bindParam(':email', $email);
    $my_insert_statement->bindParam(':message', $message);
    if ($my_insert_statement->execute()) {
        return true;
      } else {
        return false;
      }
    }



}    