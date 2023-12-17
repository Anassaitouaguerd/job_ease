<?php
session_start();
require_once "../model/search.php";
require_once "../model/script_connexion.php";
if(isset($_GET['name'])){
    header('Content-Type: application/json');
    $job = new search_job($conn);
    $name = $_GET['name'];
    $location = $_GET['location'];
    $company = $_GET['company'];
    $jobs = $job->search_job($name , $location , $company);
    
    if($jobs){

            echo json_encode($jobs); 
        
    }
}
?>