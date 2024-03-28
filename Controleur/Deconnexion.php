<?php session_start();

if(!isset($_SESSION['login'])){
header("Location: login.php") ;   
}
if($_SESSION['admin']==false){
    header("Location: ../Vue../welcome.php") ;

}

?>