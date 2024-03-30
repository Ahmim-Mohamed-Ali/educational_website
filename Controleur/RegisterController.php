<?php

require_once '../Model/UserModel.php';

class RegisterController {
    protected $userModel;
    protected $Message;


    public function __construct() {
        $this->userModel = new UserModel();
    }


    public function RegisterUser($email,$password,$id_prof){
        $user = $this->userModel->InsertUserInDatabase($email, $password,$id_prof);
        if ($user) {
            session_start();
            $_SESSION['email_account']=$email;
            header('Location: confirm_user.php');
        }
        else{
            $this->Message="Compte Non Crée";
        }
    }

    public function getMessage() {
        return $this->Message;
    }







}    