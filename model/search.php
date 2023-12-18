<?php
class search_job{
    public $con;
    public function __construct($conn){
        $this->con = $conn;
    }
    function search_job($name , $location , $company){
        $sql = "SELECT * FROM jobs WHERE title LIKE '%$name%' 
        AND `location` LIKE '%$location%' 
        AND company LIKE '%$company%' AND status_job='actif'";
        $result = $this->con->query($sql);
        $job = [];
        while ($row = $result->fetch_assoc()) {
            $job[] = $row;
        }
        return $job;
    }   
 }


?>