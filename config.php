<?php

//this php fie is for database( gym-management-system ) connection!

$host = "sql305.infinityfree.com";
$user = "if0_40168992";
$password = "Ofr243274ok";
$database = "if0_40168992_gym_management_system";

$conn = new mysqli($host, $user, $password, $database);

if($conn->connect_error){
    die("Connection failed: ". $conn->connect_error);
}

?>