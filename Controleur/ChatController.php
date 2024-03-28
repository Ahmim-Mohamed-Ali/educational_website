<?php

require_once '../Model/ChatModel.php';

class ChatController {
    protected $chatModel;


    public function __construct() {
        $this->chatModel = new ChatModel();
    }

    
    public function RecupererChat($email){
        $messages = $this->chatModel->getMessageInDatabase($email);
        if($messages!==null){
            $yours_message=$this->chatModel->GetYourMessage();
            $others_message=$this->chatModel->GetOtherMessage();
            include '../Vue/chat.php';
        }
        else{
            $error="Pas De Message Dans Le Chat";
            include '../Vue/chat.php';
        }     
    }

    public function AddChat($email,$message){
        $this->chatModel->AddMessageInDatabase($email,$message);
        header("Location: forum.php") ;
    }
}    