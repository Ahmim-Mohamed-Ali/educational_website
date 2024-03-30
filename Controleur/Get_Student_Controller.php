<?php
require_once '../Model/UserModel.php';

class GetAllController {
    protected $students;
    protected $userModel;
    public function __construct() {
        $this->userModel = new UserModel();
    }


    public function getAllStudents() {
        // Appeler la méthode du modèle pour récupérer tous les étudiants
        $students = $this->userModel->getAllStudentsFromDatabase();
        include '../Vue/manage.php';
    }

    public function getStudents() {
        return $this->students;
    }


    public function getMyStudents($id) {
        // Appeler la méthode du modèle pour récupérer tous les étudiants
        $students = $this->userModel->getMyStudentsFromDatabase($id);
        include '../Vue/manage.php';
    }


}
?>