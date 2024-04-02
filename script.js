// Confirmation Du Mot De Passe

var mdp1= document.querySelector('.mdp1');
var mdp2 = document.querySelector('.mdp2');

mdp2.onkeyup = function(){
    message_error=document.querySelector('.message-error')
    if(mdp1.value != mdp2.value){
        message_error.innerText ="Les Mots De Passe Ne Sont Pas Conformes"
    }
    else{
        message_error.innerText="";
    }
}



 
