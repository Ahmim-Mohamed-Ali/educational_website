<?php
require_once '../Model/UserModel.php';

class GetAllController {
    protected $students;
    protected $userModel;
    public function __construct() {
        $this->userModel = new UserModel();
    }


    public function getAllStudents() {
        // Créer une instance du modèle pour accéder à la méthode de récupération des étudiants
        $userModel = new UserModel();
        // Appeler la méthode du modèle pour récupérer tous les étudiants
        $students = $userModel->getAllStudentsFromDatabase();
        include '../Vue/manage.php';
    }

    public function getStudents() {
        return $this->students;
    }
}
?>