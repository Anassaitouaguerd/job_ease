<?php
class Connection {
    private static $server = "localhost";
    private static $username = "root";
    private static $password = "";
    private static $dbname = "jobs";
    public static function Insert(){
        return new mysqli(self::$server, self::$username, self::$password, self::$dbname);  
    }
}
$conn = Connection::Insert();
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>