<?php

//this php fie is for database( gym-management-system ) connection!

$host = "localhost";
$user = "root";
$password = "";
$database = "gym-management-system";

$conn = new mysqli($host, $user, $password, $database);

if($conn->connect_error){
    die("Connection failed: ". $conn->connect_error);
}

?>