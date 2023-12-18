<?php
session_start();
require_once "../model/script_connexion.php";
require_once "../model/aprouve.php";
$apply = new apply_offre($conn);
$accept = new aprouve_offer($conn);
if(isset($_GET['id'])){
    $job_id = $_GET['id'];
    $user_id = $_SESSION['userid'];

    $check = $apply->check_offre($user_id,$job_id);
    
    if($check > 0){
        echo "false";
    }
    else{
        $add_offre = $apply->new_offre($job_id,$user_id);

        if($add_offre){
            echo "succes"; 
        }
    }
}
if(isset($_GET['id_offre'])){
    $offre_id = $_GET['id_offre'];
    $job_id = $_GET['id_job'];
    if (isset($_GET['accept'])) {
        $_SESSION['reponse'] = "accepted" ;
        $status = "aprouve";
        $status_job = "inactif";
        $aprouve = $accept->change_status($offre_id,$status );
        $change_status = $apply->change_status_job($job_id,$status_job);
        if($aprouve && $change_status){
            header('location:../views/dashboard/offre.php');
        }
        
    }
    if (isset($_GET['reject']) ) {
        $_SESSION['reponse'] = "rejected";
        $status_job = "actif";
        $status = "inaprouve";
        $aprouve = $accept->change_status($offre_id,$status);
        $change_status = $apply->change_status_job($job_id,$status_job);
        if($aprouve && $change_status){
            header('location:../views/dashboard/offre.php');
        }

    }
}