<?php
session_start();
require_once "../model/script_connexion.php";
require_once "../model/auth.php";
    if(isset($_POST['login'])){
        extract($_POST);
        $log = new auth($conn);
        $don = $log->login($email , $password);
        if($don){
            // echo "<pre>" ;
            // var_dump($SESSION['userName']);
            // echo "</pre>" ;  
            $_SESSION['userRole'] = $don[0]['role_name'];
            $_SESSION['userName'] = $don[0]['username'];
            $_SESSION['userid'] = $don[0]['id_user'];
            $_SESSION['userEmail'] = $don[0]['email'];
            if($_SESSION['userRole'] == "admin"){
                header('location: ../views./dashboard/dashboard.php');
            }else{
                header('location: ../index.php');
            }
        }
        
    }
    elseif(isset($_POST['register'])){
        extract($_POST);
        $reg = new auth($conn);
        $isexist = $reg->login($email , $password);
        if($isexist){
            $_SESSION['messageError'] = "This account already exists.";
            header('location: ../register.php');
        }else{

            $don = $reg->register($username , $email , $password);
            if($don){
                $isexist = $reg->login($email , $password);
                $_SESSION['userRole'] = $isexist[0]['role_name'];
                $_SESSION['userid'] = $isexist[0]['id'];
                $_SESSION['userName'] = $isexist[0]['username'];
                $_SESSION['userEmail'] = $isexist[0]['email'];
                header('location: ../index.php');
            }
        }
    }
    if(isset($_GET['action'])){
        session_destroy();
        header('location: ../index.php'); 
    }
?>