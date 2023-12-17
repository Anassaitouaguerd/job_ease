<?php
class apply_offre{
    public $con ;
    public function __construct($conn){
        $this->con = $conn;
    }
    public function check_offre($user_id,$job_id){
        $sql = "SELECT * FROM offres WHERE User_id =$user_id AND job_id =$job_id";
        $result = $this->con->query($sql);
        $rows = mysqli_num_rows($result);
        return $rows;
    }
    public function new_offre($job_id,$user_id){
        $sql = "INSERT INTO `offres`(`User_id`, `job_id`, `status`) VALUES ('$user_id','$job_id','save')";
        $result = $this->con->query($sql);
        return $result ;
    }
}
class aprouve_offer{
    public $con ;
    public function __construct($conn){
        $this->con = $conn;
    }
    public function display(){
        $sql = "SELECT * FROM offres 
        JOIN users ON offres.User_id = users.id_user 
        JOIN jobs ON offres.job_id = jobs.job_id";
        $result = $this->con->query($sql);
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }
    public function change_status($offre_id , $status){
        $sql = "UPDATE `offres` SET `status`= '$status' WHERE id = $offre_id ";
        $result = $this->con->query($sql);
        return $result;
    }
    public function display_notification($id_user){
        $sql = "SELECT * FROM offres NATURAL JOIN jobs WHERE User_id = '$id_user'";
        $result = $this->con->query($sql);
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }
}