<?php

require_once '../Model/UserModel.php';

class LoginController {
    protected $userModel;
    protected $errorMessage;
    public function __construct() {
        $this->userModel = new UserModel();
    }

    public function login($email, $password) {
        $user = $this->userModel->getUserInDatabase($email, $password);
        if ($user) {

            setcookie("login", $email, time()+3600*24);
            setcookie("password", $password, time()+3600*24);
            session_start();
            // L'utilisateur est connecté avec succès, redirigez-le vers une autre page par exemple.
            $_SESSION['id']=$user['id'];
            
            $_SESSION['login']=$email;
            if($user['role']=="etudiant"){
                $_SESSION['admin']=false;
                header('Location: welcome.php');
            }
            else{
                $_SESSION['admin']=true;
                header('Location: welcome_admin.php');
            }
            exit;
        } else {
            // Afficher un message d'erreur dans la vue
            $this->errorMessage = "Mot de passe incorrect. Veuillez réessayer.";
        }
    }

    public function getErrorMessage() {
        return $this->errorMessage;
    }
}
?>