<?php
require_once '../Model/UserModel.php';

class DeleteController {
    protected $userModel;
    public function __construct() {
        $this->userModel = new UserModel();
    }


    public function DeleteStudent($user_id,$prof_id) {
        $success = $this->userModel->deleteUserFromDatabase($user_id,$prof_id);
        if($success){
            header("Location: welcome_admin.php");
        }
        else{
            echo "L'étudiant n'a pas pu etre supprimé";
        }
    }


}
?>