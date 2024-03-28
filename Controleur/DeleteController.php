<?php
require_once '../Model/UserModel.php';

class DeleteController {
    protected $userModel;
    public function __construct() {
        $this->userModel = new UserModel();
    }


    public function DeleteStudent($user_id) {
        // Créer une instance du modèle pour accéder à la méthode de récupération des étudiants
           // Appeler la méthode du modèle pour récupérer tous les étudiants
        $success = $this->userModel->deleteUserFromDatabase($user_id);
        return $success;
    }


}
?>