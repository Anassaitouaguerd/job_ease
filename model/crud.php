<?php
class condidat{
    private $con;
    public function __construct($conn){
        $this->con = $conn;
    }
}
class jobe{
    private $con;
    public function __construct($conn){
        $this->con = $conn;
    }
    public function add_job($jobName,$jobDescription,$jobCompany,$jobLocation,$jobstatus,$jobImage ){
        $sql = "INSERT INTO `jobs`( `title`, `description`, `company`, `location`, `status_job`, `image_path`) VALUES ('$jobName' , '$jobDescription' , '$jobCompany' , '$jobLocation' ,'$jobstatus' , '$jobImage')";
        $result = $this->con->query($sql);
        return $result;
    }
    public function display_job(){
        $sql = "SELECT * FROM jobs";
        $result = $this->con->query($sql);     
        return $result;

    }
    public function update_job($job_id,$jobName,$jobDescription,$jobCompany,$jobLocation,$jobstatus,$jobImage ){
        $sql = "UPDATE `jobs` SET `title`='$jobName',
        `description`='$jobDescription',
        `company`='$jobCompany',
        `location`='$jobLocation',
        `status_job`='$jobstatus',
        `image_path`='$jobImage' WHERE job_id = $job_id";
        $result = $this->con->query($sql);
        return $result;
    }
    public function update_job_withoutimg($job_id,$jobName,$jobDescription,$jobCompany,$jobLocation,$jobstatus ){
        $sql = "UPDATE `jobs` SET `title`='$jobName',
        `description`='$jobDescription',
        `company`='$jobCompany',
        `location`='$jobLocation',
        `status_job`='$jobstatus' WHERE job_id = $job_id";
        $result = $this->con->query($sql);
        return $result;
    }
    public function delet_job($id_job){
        $sql = "DELETE FROM `jobs` WHERE job_id = '$id_job'";
        $result = $this->con->query($sql);
        return $result;
    }
}
?>