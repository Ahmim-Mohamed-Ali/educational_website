<?php

require_once(__DIR__ . '/../Model/CoursModel.php');
require_once(__DIR__ . '/../Model/UserModel.php');

class CoursController {
    protected $coursModel;
    protected $cours;

    public function __construct() {
        $this->coursModel = new CoursModel();
    }

    public function AddCours($id_prof) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Traitement du fichier téléchargé
            if (isset($_FILES['diapositives']) && $_FILES['diapositives']['error'] === UPLOAD_ERR_OK) {
                $allowed = array("pdf" => "image/pdf", "jpeg" => "image/jpeg");
                $filename = $_FILES["diapositives"]["name"];
                $filetype = $_FILES["diapositives"]["type"];
                $filesize = $_FILES["diapositives"]["size"];
                $ext = pathinfo($filename, PATHINFO_EXTENSION);
                if(!array_key_exists($ext, $allowed)){
                    $error= "Erreur : Veuillez sélectionner un format de fichier valide.";
                    header('Location:addcours.php?error=' . urlencode($error));
                }

                else
                {               
                        $cheminFichier = '../../uploads/' . basename($_FILES['diapositives']['name']);
                        if (move_uploaded_file($_FILES['diapositives']['tmp_name'], $cheminFichier)) 
                        {
                            // Enregistrement du chemin du fichier dans la base de données
                            $coursModel = new CoursModel();
                            $titre = $_POST['titre'];
                            $description = $_POST['description'];
                            $url=$_POST['video'];
                            $coursModel->AddCours($titre, $description, $cheminFichier,$url,$_SESSION['id']);
                            header('Location:welcome_admin.php');
                            exit;
                        } else 
                        {
                            $error= "Une erreur s'est produite lors du téléchargement du fichier.";
                            header('Location:addcours.php?error=' . urlencode($error));
                        }                           
                }           
        }
        else                  
        {
            $error= "Erreur lors du téléchargement du fichier.";
            header('Location:addcours.php?error=' . urlencode($error));
        }    
        }

    }    

    public function RetriveCoursForAdmin($id=null){
        $cours = $this->coursModel->GetCourOfThisTeacher($id);
        include '../Vue/cours_admin.php';


    }

    public function RetriveAllModulesById($id=null){
        $userModel=new UserModel();
        $profs_id=$userModel->getAllIdProfesseur($id);
        $modules=array();
        foreach($profs_id as $id_prof){

            $modules[] = $this->coursModel->GetCourOfTeacher($id_prof);

        }
        include '../Vue/module.php';


    }

    public function DeleteCours($id){        
        if($this->coursModel->DeleteCours($id)){
            $cour=$this->coursModel->GetCourId($id);
            $cheminFichier=$cour['chemin'];
            if(file_exists($cheminFichier)){
                if(unlink($cheminFichier)){
                    echo "supprimme avec succes";
                    header('Location: welcome_admin.php?success=remove');
                }
                else{
                    echo "supprimme echec";
                    header('Location: welcome_admin.php?success=not_remove');
                }

            }
        }
    }
}






?>
