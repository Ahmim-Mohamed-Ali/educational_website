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
            include '../Vue/chat.php';
        }
        else{
            $error="Pas De Message Dans Le Chat";
            include '../Vue/chat.php';
        }     
    }

    public function AddChat($email,$message){
        if($this->chatModel->AddMessageInDatabase($email,$message)==true){
            header("Location: forum.php") ;
        }
        
    }
}    