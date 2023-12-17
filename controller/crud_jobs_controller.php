<?php
require_once "../model/script_connexion.php";
require_once "../model/crud.php";
$job = new jobe($conn);


if(isset($_POST['save_job'])){
    extract($_POST);
    $image_name= $_FILES['jobImage']['name'];
    $image_temp= $_FILES['jobImage']['tmp_name'];
    $image_type= $_FILES['jobImage']['type'];
    $image_size= $_FILES['jobImage']['size'];
    $image_error= $_FILES['jobImage']['error'];
    $allowed = array('jpg' , 'png' , 'jif');
    $image = explode('.' , $image_name);
    $image_ext = strtolower(end($image));
    if($image_error == 4){
        echo "file is not uploaded";
    }
    else if($image_size){
        if(in_array($image_ext , $allowed)){
            $jobImage = uniqid() . $image_name;
            move_uploaded_file($image_temp , $_SERVER['DOCUMENT_ROOT'] . '/jobease-php-oop/styles/img/' . $jobImage);
            $jobs = $job->add_job($jobName , $jobDescription , $jobCompany , $jobLocation , $jobstatus , $jobImage);
            if($jobs){
                header('location:../views/dashboard/Jobs.php');
            } 
        }else{
            echo "file is not valid you need this extention ('jpg' , 'png' , 'jfif')";
        }
    }else{
        echo "size to file is so heigh";
    }
    
}else if(isset($_POST['edit_job'])){
    extract($_POST);
    $image_name= $_FILES['jobImage']['name'];
    $image_temp= $_FILES['jobImage']['tmp_name'];
    $image_type= $_FILES['jobImage']['type'];
    $image_size= $_FILES['jobImage']['size'];
    $allowed = array('jpg' , 'png' , 'jif');
    $image = explode('.' , $image_name);
    $image_ext = strtolower(end($image));
 if($image_size){
        if(in_array($image_ext , $allowed)){
            $jobImage = uniqid() . $image_name;
            move_uploaded_file($image_temp , $_SERVER['DOCUMENT_ROOT'] . '/jobease-php-oop/styles/img/' . $jobImage);
            
            $jobs = $job->update_job($job_id , $jobName , $jobDescription , $jobCompany , $jobLocation , $jobstatus , $jobImage);
            if($jobs){
                header('location:../views/dashboard/Jobs.php');
            } 
        }else{
            echo "file is not valid you need this extention ('jpg' , 'png' , 'jfif')";
        }
    }else{
        $jobs = $job->update_job_withoutimg($job_id , $jobName , $jobDescription , $jobCompany , $jobLocation , $jobstatus );
        if($jobs){
            header('location:../views/dashboard/Jobs.php');
        } 
    }
}else if(isset($_GET['delet'])){
    header('Content-Type: application/json');
    $id_job = $_GET['delet'];
    $del_job = $job->delet_job($id_job);
    if($del_job){
        echo json_encode($del_job);
    }
}












?>