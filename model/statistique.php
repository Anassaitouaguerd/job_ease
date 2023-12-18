<?php
class display_statistique{
    public $con;
    public function __construct($conn){
        $this->con = $conn;
    }
    public function statistique_jobs(){
        $sql = "SELECT COUNT(*) AS total_jobs FROM jobs";
        $result = $this->con->query($sql);
        $job = [];
        while ($row = $result->fetch_assoc()) {
            $job[] = $row;
        }
        return $job;
    }
    public function job_actif(){
        $sql = "SELECT COUNT(*)AS actif_job FROM jobs WHERE status_job = 'actif'";
        $result = $this->con->query($sql);
        $job = [];
        while ($row = $result->fetch_assoc()) {
            $job[] = $row;
        }
        return $job;
    }
    public function number_user(){
        $sql = "SELECT COUNT(*)AS total_users FROM users";
        $result = $this->con->query($sql);
        $job = [];
        while ($row = $result->fetch_assoc()) {
            $job[] = $row;
        }
        return $job;
    }
    public function offre_aprouve(){
        $sql = "SELECT COUNT(*)AS total_aprouve FROM offres WHERE `status` = 'aprouve'";
        $result = $this->con->query($sql);
        $job = [];
        while ($row = $result->fetch_assoc()) {
            $job[] = $row;
        }
        return $job;
    }
    public function offre_inaprouve(){
        $sql = "SELECT COUNT(*)AS total_inaprouve FROM offres WHERE `status` = 'inaprouve'";
        $result = $this->con->query($sql);
        $job = [];
        while ($row = $result->fetch_assoc()) {
            $job[] = $row;
        }
        return $job;
    }
    }