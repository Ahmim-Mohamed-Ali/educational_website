<?php

require_once '../Model/UserModel.php';

class RegisterController {
    protected $userModel;
    protected $Message;


    public function __construct() {
        $this->userModel = new UserModel();
    }


    public function RegisterUser($email,$password){
        $user = $this->userModel->InsertUserInDatabase($email, $password);
        if ($user) {
            session_start();
            $_SESSION['email_account']=$email;
            header('Location: confirm_user.php');
        }
        else{
            $Message="Compte Non Crée";
        }
    }

    public function getMessage() {
        return $this->Message;
    }







}    