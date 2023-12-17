<?php
class auth{
    private $con; 
    public function __construct($conn){
        $this->con = $conn;
    }
    public function login($email , $password){
        $password_hash = MD5($password);
        $SQL = "SELECT * FROM users WHERE email = '$email' AND `password` = '$password_hash'";
        $result = $this->con->query($SQL);
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }   
    public function register($username , $email , $password){
        $password_hash = MD5($password);
        $SQL = "INSERT INTO `users`(`username`, `email`, `password`, `role_name`) VALUES ('$username','$email','$password_hash', 'candidat')";
        $result = $this->con->query($SQL);
        return $result;
    }   
}

?>