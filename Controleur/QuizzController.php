<?php
require_once '../Model/QuizzModel.php';

class QuizzController{
    protected $quizzModel;

    public function __construct() {
        $this->quizzModel = new QuizzModel();
    }


    public function GetAllOfQuestions($id_cours,$level){

        $questions=$this->quizzModel->GetAllQuestions($id_cours,$level);
        echo '<form action="reponse.php" method="post">
        <ol>';
        foreach($questions as $question){
            echo '<div class=the_question>';
            echo '<h3 class="question"><li>'.$question['libelleQ'].'</li></h3>';
        $this->GetAllOfAnswers($question['id']);
            echo '</div>';
        }
        



        echo'</ol>        
    <input type="submit" name="submit" value="Envoyer" class="style_btn">
    </form> ';
    }



public function GetAllOfAnswers($id_question,$bool=true){
    $answers=$this->quizzModel->GetAllAnswers($id_question);
    if($bool==true){
        foreach($answers as $answer){
            echo '<input type="radio" name="'.$id_question.'" value="'.$answer['id_reponse'].'" required>'.$answer['libelle'].'</br>';
        }
    }
    else{
        return $answers;
    }
}



public function GetAnswerOfUser($id_reponse){
    $right_answer=$this->quizzModel->GetAnswerOfUser($id_reponse);
    if(count($right_answer)>=1){
        return true;
    }
    else{
        return false;
    }
}




public function GetLibelleQuestion($id_question){
    $result=$this->quizzModel->GetLibelleOfQuestion($id_question);
    return $result;
}

public function GetRightAnswer($id_question){
    $result=$this->quizzModel->GetRightAnswer($id_question);
    return $result;var_dump($result);
}


}
?>